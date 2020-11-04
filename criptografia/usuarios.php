<?php

session_start();

require_once "../php-includes/config.php";

try {

    // CONEXÃO
    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM usuario";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS);

} catch (\Exception $e) {

    echo "<div class='session-message error'><p class='negrito'>" . $e->getMessage() . "</p></div>";

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
                    <div class="container">
                        <div class="content">
                            <?php if(isset($_SESSION['msg'])){ ?>

                                <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                    <p><?= $_SESSION['msg']['message']; ?></p>
                                </div>

                            <?php } ?>
                            <?php unset($_SESSION['msg']); ?>
                            <div class="ds-flex">
                                <div class="flex" id="table">
                                    <h1>Usuários e Senhas</h1>
                                    <table>
                                        <tr>
                                           <th>E-mail</th>
                                           <th>Senha</th>
                                       </tr>
                                       <?php foreach ($usuarios as $usuario) { ?>
                                        <tr>
                                           <td><?= $usuario->email; ?></td>
                                           <td><?= $usuario->senha; ?></td>
                                       </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="container main_pesquisa">
                        <div class="content">
                            <div class="box-message">
                                <h1>Criptografia</h1>
                                <p>
                                    Toda senha armazenada no banco de dados precisa estar sob uma criptografia segura. MD5 e SHA1 já não são mais o melhor método para utilizar.
                                </p>
                                <h2>Restou alguma dúvida ?</h2>
                                <p>
                                    Assista o episódio referente a essa falha, disponível no Youtube.
                                </p>
                                <a target="_blank" title="Youtube | Web Falhas | Criptografia" href="https://youtu.be/TYq8lnnisZo"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 6</button></a>
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
