<?php
session_start();
require_once "../php-includes/config.php";

try {

    // CONEXÃO
    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT nome, texto FROM comentario INNER JOIN usuario ON usuario.id = comentario.id_usuario ORDER BY comentario.id DESC";
    $stmt = $conn->query($query);
    $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

} catch (\Exception $e) {

    echo $e->getMessage();

}

?>
<html lang="pt-br" dir="ltr">
    <head>
        <?php

        require_once "../php-includes/head.php";

        ?>
    </head>
    <body>
        <div class="corpo">
            <div class="main_div">
                <!-- MENU -->
                <?php

                require_once "../php-includes/header-mobile.php";

                ?>
                <!--  -->
                <div class="box bg-branco menu-desktop">
                    <!-- MENU -->
                    <?php

                    require_once "../php-includes/header-desktop.php";

                    ?>
                </div>
                <div class="box">
                    <!--  -->
                    <div class="container main_comentarios">
                        <div class="content">
                            <div class="ds-flex">
                                <div id="comentarios" class="flex">
                                    <h1>Comentários sobre o Laboratório:</h1>
                                    <div class="feedback">
                                        <?php foreach ($resultados as $comentario) { ?>
                                            <div class="box">
                                                <h1><?= $comentario->nome; ?></h1>
                                                <p>"<?= $comentario->texto; ?>"</p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <form class="form-padrao" action="comentario-action.php" method="post">
                                        <?php if(isset($_SESSION['msg'])){ ?>

                                            <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                                <p><?= $_SESSION['msg']['message']; ?></p>
                                            </div>

                                        <?php } ?>
                                        <?php unset($_SESSION['msg']); ?>
                                        <h1>Deixe sua avaliação:</h1>
                                        <label for="comentario">
                                            <input required autocomplete="off" placeholder="Comentário" type="text" name="texto" value="<?= $usuario->complemento; ?>"/>
                                        </label>
                                        <div class="direita">
                                            <button type="submit" class="icone icone-fenix btn btn-primary" name="button">ENVIAR</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="box-message">
                                    <h1>XSS (Stored)</h1>
                                    <p>
                                        "Ataques armazenados são aqueles em que o script injetado é
                                        armazenado permanentemente nos servidores de destino, como
                                        em um banco de dados, em um fórum de mensagens, registro de
                                        visitantes, campo de comentários, etc..."
                                    </p>
                                    <p class="fonte">- OWASP (https://owasp.org/www-community/attacks/xss/#stored-xss-attacks)</p>
                                    <h2>Informações Adicionais</h2>
                                    <p>
                                        Depois do ataque você pode restaurar o laborátorio para testar novamente.
                                    </p>
                                    <h2>Restou alguma dúvida ?</h2>
                                    <p>
                                        Assista o episódio referente a essa falha, disponível no Youtube.
                                    </p>
                                    <a target="_blank" title="Youtube | Web Falhas | XSS Stored" href="https://youtu.be/AfT9ZaTDba0"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 3</button></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <!-- RODAPÉ -->
                    <?php

                    require_once "../php-includes/footer.php";

                    ?>
                    <!--  -->
                </div>
            </div>
        </div>
    </body>
</html>
