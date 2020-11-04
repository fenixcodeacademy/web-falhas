<?php

session_start();

$diretorio = '../img/';
$nome_arquivo = $_FILES['imagem']['name'];
$extensao = explode('.', $nome_arquivo);
$extensoes_permitidas = array('jpg','jpeg','png','gif');

try {

    if (in_array($extensao[1], $extensoes_permitidas)) {

        move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nome_arquivo);
        $_SESSION['msg']['error'] = 0;
        $_SESSION['msg']['message'] = "Upload feito com sucesso !";

    }else {

        throw new Exception("Extensão inválida.");

    }

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();

}

header("Location: upload.php");

/* FORMA CORRETA !

- Não se esqueça de instalar o composer, instalar a biblioteca codeguy/upload
e fazer o require do autoload do composer. Assista o Episódio 6 caso tenha
duvídas.

- Mais exemplos em: https://github.com/brandonsavage/Upload

require '../vendor/autoload.php';

session_start();

$storage = new \Upload\Storage\FileSystem('../img');
$file = new \Upload\File('imagem', $storage);

$file->setName($_FILES['imagem']['name']);

// MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
$file->addValidations(array(
    new \Upload\Validation\Mimetype(array('image/png', 'image/jpeg', 'image/gif')),
    new \Upload\Validation\Size('5M')
));

try {

    $file->upload();
    $_SESSION['msg']['error'] = 0;
	$_SESSION['msg']['message'] = "Upload feito com sucesso !";

} catch (\Exception $e) {

    // $errors = $file->getErrors();
    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();

}

header("Location: upload.php");

*/
