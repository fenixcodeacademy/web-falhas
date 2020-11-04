<?php

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

try {

    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {

        throw new Exception("O e-mail não é válido.");

    }

    $query = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetchObject();

    if (!empty($usuario->id)) {

        if (password_verify($senha, $usuario->senha) === false) {

            throw new Exception('E-mail ou Senha incorretos !');

        }else {

            //gerar hash novamente se necessário
            $currentHashAlgorith = PASSWORD_DEFAULT;
            $currentHashOptions = array('cost' => 10);
            $passwordNeedsRehash = password_needs_rehash(

                $usuario->senha,
                $currentHashAlgorith,
                $currentHashOptions

            );

            if ($passwordNeedsRehash === true) {

                $senhaAtualizada = password_hash(

                    $senha,
                    $currentHashAlgorith,
                    $currentHashOptions

                );

                $query = "UPDATE usuario SET senha = :senha WHERE email = :email";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senhaAtualizada);
                $stmt->execute();

            }

            $_SESSION['login'] = true;
            $_SESSION['query'] = $query;
            $_SESSION['nome'] = $usuario->nome;
            exit(header("Location: administrador.php"));

        }

    }else {

        throw new Exception('E-mail ou Senha incorretos !');

    }

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();
    exit(header("Location: login.php"));

}
