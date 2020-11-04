<?php

session_start();
require_once "../php-includes/config.php";

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
                    <div class="container main_login">
                        <div class="content">
                            <div class="ds-flex">
                                <form class="form-padrao flex" action="upload-action.php" method="post" enctype="multipart/form-data">
                                    <h1>Envie uma Imagem:</h1>
                                    <span>Selecione uma imagem:</span>
                                    <div id="upload">
                                        <input required type="file" id="imagem" name="imagem"/>
                                        <button type="button" class="btn btn-primary" name="button">Selecione uma Imagem</button>
                                        <p id="nome"></p>
                                    </div>
                                    <script type="text/javascript">
                                        let imagem = document.getElementById('imagem');
                                        imagem.addEventListener("change", function() {

                                            if (this.files[0].name) {
                                                let nome = document.getElementById("nome");
                                                nome.innerHTML = "<b>Arquivo:</b> " + this.files[0].name;
                                            }

                                        });
                                    </script>
                                    <hr>
                                    <div class="direita">
                                        <button type="submit" class="icone icone-fenix btn btn-primary" name="button">Enviar</button>
                                    </div>
                                    <?php if(isset($_SESSION['msg'])){ ?>

                                        <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                            <p><?= $_SESSION['msg']['message']; ?></p>
                                        </div>

                                    <?php } ?>
                                    <?php unset($_SESSION['msg']); ?>
                                </form>
                                <div class="box-message">
                                    <h1>SHELL UPLOAD</h1>
                                    <p>
                                        "Os arquivos carregados representam um risco significativo para os aplicativos. O primeiro passo em muitos ataques é levar algum código ao sistema a ser atacado. Então, o hacker só precisa encontrar uma maneira de fazer o código ser executado.
                                        Usar um upload de arquivo ajuda o invasor a realizar a primeira etapa..."
                                    </p>
                                    <p class="fonte">- OWASP (https://owasp.org/www-community/vulnerabilities/Unrestricted_File_Upload)</p>
                                    <h2>Restou alguma dúvida ?</h2>
                                    <p>
                                        Assista o episódio referente a essa falha, disponível no Youtube.
                                    </p>
                                    <a target="_blank" title="Youtube | Web Falhas | Shell Upload" href="https://youtu.be/ETBp1QHCdBE"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 5</button></a>
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
