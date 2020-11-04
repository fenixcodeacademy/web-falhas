<?php
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
                                <form class="form-padrao" action="#" method="post">
                                    <h1>Cadastro</h1>
                                    <label for="email">
                                        <span>Nome:</span>
                                        <input required class="icone icone-user" placeholder="Seu Nome" type="text" name="nome" value="<?= $usuario->nome; ?>"/>
                                    </label>
                                    <label for="email">
                                        <span>E-mail:</span>
                                        <input required class="icone icone-email" placeholder="Seu e-mail" type="email" name="email" value="<?= $usuario->email; ?>"/>
                                    </label>
                                    <label for="">
                                        <span>Selecione seu idioma:</span>
                                        <select>
                                            <option value=2>English</option>
                                            <option value=3>Italiano</option>
                                            <option value=4>Espanhol</option>
                                            <option value=5>Japonês</option>
                                        </select>
                                    </label>
                                    <label for="email">
                                        <span>Endereço:</span>
                                        <input required class="icone icone-localizacao" placeholder="Seu endereço" type="text" name="endereco" value="<?= $usuario->endereco; ?>"/>
                                    </label>
                                    <label for="email">
                                        <span>Complemento:</span>
                                        <input required class="icone icone-localizacao" placeholder="Complemento" type="text" name="complemento" value="<?= $usuario->complemento; ?>"/>
                                    </label>
                                    <div class="direita">
                                        <button type="submit" class="icone icone-fenix btn btn-primary" name="button">SALVAR</button>
                                    </div>
                                    <?php if(isset($_SESSION['msg'])){ ?>

                                        <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                            <p><?= $_SESSION['msg']['message']; ?></p>
                                        </div>

                                    <?php } ?>
                                    <?php unset($_SESSION['msg']); ?>
                                </form>
                                <div class="box-message">
                                    <h1>XSS (DOM Based)</h1>
                                    <p>
                                        "O XSS baseado em DOM é um ataque XSS em que a carga de ataque
                                        é executada como resultado da modificação do 'ambiente' DOM
                                        no navegador da vítima usado pelo cliente original script, para que
                                        o código do lado do cliente seja executado de maneira 'inesperada'. "
                                    </p>
                                    <p class="fonte">- OWASP (https://owasp.org/www-community/attacks/DOM_Based_XSS)</p>
                                    <h2>Informações Adicionais</h2>
                                    <p>
                                        Depois do ataque você pode restaurar o laborátorio para testar novamente.
                                    </p>
                                    <h2>Restou alguma dúvida ?</h2>
                                    <p>
                                        Assista o episódio referente a essa falha, disponível no Youtube.
                                    </p>
                                    <a target="_blank" title="Youtube | Web Falhas | XSS DOM Based" href="https://youtu.be/_kMXsTco3EE"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 3</button></a>
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>

            function htmlEntities(str) {
                return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
            }

            let searchParams = new URLSearchParams(window.location.search)
            var param = searchParams.get('default')

            param = htmlEntities(param);

            if (param) {

                $("select").append("<option selected value=1>"+param+"</option>");

            }

        </script>
    </body>
</html>
