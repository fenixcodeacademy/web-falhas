<?php

session_start();
require_once "../php-includes/config.php";

if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
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
                    <div class="container main_login">
                        <div class="content">
                            <div class="ds-flex">
                                <form class="form-padrao flex" action="login-action.php" method="post">
                                    <h1>Entre em sua conta</h1>
                                    <label for="email">
                                        <span class="negrito">E-mail:</span>
                                        <input autocomplete="off" required class="icone icone-email" placeholder="Seu E-mail" type="email" name="email" value=""/>
                                    </label>
                                    <label for="password">
                                        <span class="negrito">Senha:</span>
                                        <input required class="icone icone-password" placeholder="********" type="password" name="senha" value=""/>
                                    </label>
                                    <div class="direita">
                                        <button type="submit" class="icone icone-fenix btn btn-primary" name="button">Entrar</button>
                                    </div>
                                    <?php if(isset($_SESSION['msg'])){ ?>

                                        <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                            <p><?= $_SESSION['msg']['message']; ?></p>
                                        </div>

                                    <?php } ?>
                                    <?php unset($_SESSION['msg']); ?>
                                </form>
                                <div class="box-message">
                                    <h1>SQL Injection</h1>
                                    <p>
                                        "Um ataque de injeção SQL consiste na inserção ou “injeção” de
                                        uma consulta SQL por meio dos dados de entrada do cliente para o aplicativo..."
                                    </p>
                                    <p class="fonte">- OWASP (https://owasp.org/www-community/attacks/SQL_Injection)</p>
                                    <h2>Informações Adicionais</h2>
                                    <p>
                                        Os dados de acesso estão logo abaixo, porém, para fins de aprendizado você não deve utiliza-los !
                                    </p>
                                    <p><b>Login:</b> fenixcodeacademy@local.com</p>
                                    <p><b>Senha:</b> fenixcodeacademy</p>
                                    <h2>Restou alguma dúvida ?</h2>
                                    <p>
                                        Assista o episódio refêrente à falha, disponível no Youtube.
                                    </p>
                                    <a target="_blank" title="Youtube | Web Falhas | SQL Injection" href="https://youtu.be/DGHo9h4pOAs"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 2</button></a>
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
