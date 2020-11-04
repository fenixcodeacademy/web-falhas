<?php

session_start();

$nome = htmlentities($_POST['nome'], ENT_QUOTES, 'UTF-8');
$email = $_POST['email'];
$endereco = htmlentities($_POST['endereco'], ENT_QUOTES, 'UTF-8');
$complemento = htmlentities($_POST['complemento'], ENT_QUOTES, 'UTF-8');
$senha = $_POST['senha'];
$confirmacao_senha = $_POST['confirmacao_senha'];

try {

    foreach ($_POST as $key => $value) {

        if (empty(trim($value))) {

            throw new Exception("Preencha todos os campos.");

        }

    }

    if ($senha != $confirmacao_senha) {

        throw new Exception("As senhas são diferentes.");

    }

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {

        throw new Exception("O e-mail não é válido.");

    }

    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id FROM usuario WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetchObject();
    if (!empty($usuario->id)) {

        throw new Exception('Esse usuário já está cadastrado.');

    }

    $query = "INSERT INTO usuario (nome, email, endereco, complemento, senha) VALUES (:nome, :email, :endereco, :complemento, :senha)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':complemento', $complemento);

    //HASH
    $passwordHash = password_hash(

        $senha,
        PASSWORD_DEFAULT,
        ['cost' => 12]

    );

    if ($passwordHash === false) {

        throw new Exception('Erro ao gerar o segredo.');

    }

    $stmt->bindParam(':senha', $passwordHash);
    $stmt->execute();

    $_SESSION['msg']['error'] = 0;
    $_SESSION['msg']['message'] = "'$email' cadastrado com sucesso.";
    exit(header("Location: usuarios.php"));

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();
    exit(header("Location: cadastro.php"));

}
