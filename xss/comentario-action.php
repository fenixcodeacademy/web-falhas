<?php

session_start();

try {

    // CONEXÃO
    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /* FORMA CORRETA

    $texto = htmlentities($_POST['texto'], ENT_QUOTES, 'UTF-8');

    */

    //FORMA ERRADA
    $texto = $_POST['texto'];

    $query = "INSERT INTO comentario(id_usuario, texto) VALUES (1, :texto)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":texto", $texto);
    $stmt->execute();

    $_SESSION['msg']['error'] = 0;
    $_SESSION['msg']['message'] = "Comentário Adicionado com sucesso !";
    $_SESSION['query'] = $query;

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();

}

header("Location: stored.php");
