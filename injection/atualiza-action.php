<?php

session_start();

try {


    // CONEXÃO
    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $complemento = $_POST['complemento'];

    //FORMA ERRADA
    $nome = $_POST['nome'];
    $query = "UPDATE usuario SET nome = '$nome', email = '$email', endereco = '$endereco', complemento = '$complemento' WHERE id = $id";
    $stmt = $conn->query($query);

    /* FORMA CORRETA !

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {

        throw new Exception("O e-mail não é válido.");

    }

    $query = "UPDATE usuario SET nome = :nome, email = :email, endereco = :endereco, complemento = :complemento WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    */

    $_SESSION['query'] = $query;
    $_SESSION['msg']['error'] = 0;
    $_SESSION['msg']['message'] = "Alterações feitas com sucesso !";

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();

}

header("Location: usuarios.php");
