<?php

session_start();

require_once "php-includes/config.php";

?>
<html lang="pt-br" dir="ltr">
    <head>
        <?php

        require_once "php-includes/head.php";

        ?>
    </head>
    <body>
        <div class="corpo">
            <div class="main_div">
                <!-- MENU -->
                <?php

                require_once "php-includes/header-mobile.php";

                ?>
                <!--  -->
                <div class="box bg-branco menu-desktop">
                    <!-- MENU -->
                    <?php

                    require_once "php-includes/header-desktop.php";

                    ?>
                </div>
                <div class="box">
                    <!--  -->
                    <div class="container main_dash">
                        <div class="content">
                            <?php if(isset($_SESSION['msg'])){ ?>

                                <div class="session-message margin20 <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                    <p><?= $_SESSION['msg']['message']; ?></p>
                                </div>

                            <?php } ?>
                            <?php unset($_SESSION['msg']); ?>
                            <div id="logo-web-falhas">
                                <a title="Fênix Code Academy | Web Falhas" href="<?= URL_BASE; ?>"><img src="img/webfalhas.png" alt=""></a>
                            </div>
                            <div class="margin20">
                                <h1 class="icone icone-fenix">Bem-vindo</h1>
                                <p>
                                    O Laboratório da série <a target="_blank" title="GitHub Web Falhas" href="https://github.com/fenixcodeacademy/web-falhas" class="link-cinza negrito">Web Falhas</a> foi desenvolvido
                                    com intuito de ajudar os estudantes de Segurança da Informação e Programadores Web, para
                                    que desenvolvam suas habilidades e se tornem profissionais ainda melhores.
                                </p>
                            </div>
                            <div class="margin20">
                                <h2>Assuntos Abordados</h2>
                                <p class="icone icone-option">INJECTION</p>
                                <p class="icone icone-option">XSS</p>
                                <p class="icone icone-option">APACHE</p>
                                <p class="icone icone-option">SHELL UPLOAD</p>
                                <p class="icone icone-option">CRIPTOGRAFIA</p>
                            </div>
                            <div class="margin20">
                                <h2>Gostou do Projeto ?</h2>
                                <p>
                                    O Projeto <a target="_blank" title="Fênix Code Academy" href="https://fenixcodeacademy.com" class="link-cinza negrito">Fênix Code Academy</a> continuará trazendo novidades, então siga no <a target="_blank" title="Instagram Fênix Code Academy" href="https://instagram.com/fenixcodeacademy" class="link-cinza negrito">Instagram</a>
                                    e acompanhe o <a target="_blank" title="Canal Youtube Fênix Code Academy" href="https://youtube.com/c/fenixcodeacademy" class="link-cinza negrito">Canal no Youtube</a> para ficar por dentro de tudo.
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <!-- RODAPÉ -->
                    <?php

                    require_once "php-includes/footer.php";

                    ?>
                    <!--  -->
                </div>
            </div>
        </div>
    </body>
</html>
