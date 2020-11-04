<?php

session_start();
try {

    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $senha = MD5($_POST['senha']);

    // FORMA ERRADA
    $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $stmt = $conn->query($query);
    $usuario = $stmt->fetchObject();

    /* FORMA CORRETA !

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {

        throw new Exception("O e-mail não é válido.");

    }

    $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $usuario = $stmt->fetchObject();

    */

    if (!empty($usuario->id)) {
        $_SESSION['login'] = true;
        $_SESSION['query'] = $query;
        $_SESSION['nome'] = $usuario->nome;
        exit(header("Location: administrador.php"));
    }else {

        throw new Exception('Login ou Senha incorretos !');

    }

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();
    exit(header("Location: login.php"));

}
