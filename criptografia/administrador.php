<?php

session_start();

if (!isset($_SESSION['login'])) {

    exit(header("Location: login.php"));

}

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
                    <div class="container main_admin">
                        <div class="content">
                            <h1>Login realizado com sucesso !</h1>
                            <h1>Bem-vindo, <?= $_SESSION['nome']; ?>.</h1>
                            <div class="session-message success">
                                <p class="negrito">Consulta executada:</p>
                                <p id="query"><?= $_SESSION['query']; ?></p>
                            </div>
                            <div>
                                <a href="login.php">
                                    <button type="button" class="btn btn-primary icone icone-fenix" name="button">Voltar para o Login</button>
                                </a>
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
