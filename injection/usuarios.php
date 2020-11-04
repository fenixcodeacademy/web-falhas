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
                            <div class="ds-flex">
                                <div class="flex" id="table">
                                    <h1>Escolha um usuário para atualizar.</h1>
                                    <?php if(isset($_SESSION['msg'])){ ?>

                                        <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                            <?= ($_SESSION['msg']['error'] == 1 ? null : '<p class="negrito">Consulta Executada:</p>'); ?>
                                            <?= ($_SESSION['msg']['error'] == 1 ? null : '<p id="query">' . $_SESSION['query'] . '</p>'); ?>
                                        </div>

                                    <?php } ?>
                                    <?php unset($_SESSION['msg']); ?>
                                    <table>
                                        <tr>
                                           <th>Nome</th>
                                           <th>Opções</th>
                                       </tr>
                                       <?php foreach ($usuarios as $usuario) { ?>
                                        <tr>
                                           <td><?= $usuario->nome; ?></td>
                                           <td>
                                               <a href="atualiza.php?id=<?= $usuario->id; ?>">
                                                   <button type="button" class="btn btn-secundary" name="button">
                                                       Editar
                                                   </button>
                                               </a>
                                           </td>
                                       </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <?php if(isset($_SESSION['msg'])){ ?>

                                    <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                        <p><?= $_SESSION['msg']['message']; ?></p>
                                    </div>

                                <?php } ?>
                                <?php unset($_SESSION['msg']); ?>
                                <div class="box-message">
                                    <h1>Blind SQL Injection</h1>
                                    <p>
                                        "Blind SQL (Structured Query Language) é um tipo de ataque de injeção de SQL que faz perguntas verdadeiras ou falsas ao banco de dados e determina a resposta com base na resposta do aplicativo."
                                    </p>
                                    <p class="fonte">- OWASP (https://owasp.org/www-community/attacks/Blind_SQL_Injection)</p>
                                    <h1>SQL Injection</h1>
                                    <p>
                                        "Um ataque de injeção SQL consiste na inserção ou “injeção” de
                                        uma consulta SQL por meio dos dados de entrada do cliente para o aplicativo..."
                                    </p>
                                    <p class="fonte">- OWASP (https://owasp.org/www-community/attacks/SQL_Injection)</p>
                                    <h2>Restou alguma dúvida ?</h2>
                                    <p>
                                        Assista o episódio refêrente à falha, disponível no Youtube.
                                    </p>
                                    <h2>Restou alguma dúvida ?</h2>
                                    <p>
                                        Assista o episódio referente a essa falha, disponível no Youtube.
                                    </p>
                                    <button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 2</button>
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
