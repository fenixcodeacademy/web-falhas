<?php

session_start();

try {

    $filename = 'database/banco.sql';
    unlink('database/banco.sql');

    $file_name = "database/banco.sql";
    $file = fopen($file_name, 'w') or die('Error opening file: ' . $file_name);
    fclose($file);
    chmod($file, 0777);

    // CONEXÃO
    $conn = new PDO('sqlite:database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "

    CREATE TABLE usuario(

        id integer PRIMARY KEY NOT NULL,
        nome varchar(50),
        email varchar(50),
        endereco varchar(255),
        complemento varchar(255),
        senha varchar(255)

    );

    ";
    $stmt = $conn->query($query);

    $query = "

    CREATE TABLE comentario(

        id integer PRIMARY KEY NOT NULL,
        id_usuario integer,
        texto varchar(255),
        FOREIGN KEY (id_usuario) REFERENCES usuario(id)

    );

    ";
    $stmt = $conn->query($query);

    $query = " INSERT INTO usuario (nome, email, endereco, complemento, senha) VALUES ('Administrador', 'fenixcodeacademy@local.com', 'Rua John Doe, n° 8', 'Perto da Estação do Metro', '".MD5('fenixcodeacademy')."') ";
    $stmt = $conn->query($query);

    $query = " INSERT INTO usuario (nome, email, endereco, complemento, senha) VALUES ('Usuário 1', 'usuario1@local.com', 'Rua John Doe, n° 23', 'Perto da Estação do Metro', '".MD5('fenixcodeacademy')."') ";
    $stmt = $conn->query($query);

    $query = " INSERT INTO usuario (nome, email, endereco, complemento, senha) VALUES ('Usuário 2', 'usuario2@local.com', 'Rua John Doe, n° 23', 'Perto da Estação do Metro', '".MD5('fenixcodeacademy')."') ";
    $stmt = $conn->query($query);

    $query = " INSERT INTO comentario(id_usuario, texto) VALUES (1, 'Ótimo laboratório para testar os conhecimentos !')";
    $stmt = $conn->query($query);

    $_SESSION['msg']['error'] = 0;
    $_SESSION['msg']['message'] = 'O sistema foi restaurado com sucesso !';

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();

}

header("Location: principal.php");
