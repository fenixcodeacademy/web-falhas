<?php
require_once "../php-includes/config.php";

session_start();
try {

    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // FORMA ERRADA
    if (isset($_GET['pesquisa'])) {

        $pesquisa = $_GET['pesquisa'];
        $query = "SELECT * FROM usuario WHERE nome LIKE '%$pesquisa%'";

    }else {

        $pesquisa = null;
        $query = "SELECT * FROM usuario";

    }

    $stmt = $conn->query($query);
    $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS);

    /* FORMA CORRETA !

    if (isset($_GET['pesquisa'])) {

        $pesquisa = $_GET['pesquisa'];
        $query = 'SELECT * FROM usuario WHERE nome LIKE :pesquisa';
        $stmt = $conn->prepare($query);
        $search = "%".$pesquisa."%";
        $stmt->bindParam(':pesquisa', $search);

    }else {

        $pesquisa = null;
        $query = "SELECT * FROM usuario";
        $stmt = $conn->prepare($query);

    }

    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_CLASS);

    */

    $_SESSION['msg']['error'] = 0;
    $_SESSION['msg']['message'] = $query;

} catch (\Exception $e) {

    $_SESSION['msg']['error'] = 1;
    $_SESSION['msg']['message'] = $e->getMessage();

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
                                    <form class="form-padrao" action="pesquisa.php" method="get">
                                        <h1>Pesquisar Usuários</h1>
                                        <label for="pesquisa">
                                            <input required class="icone icone-pesquisa" autocomplete="off" placeholder="nome do usuário" type="text" name="pesquisa" value="<?= $pesquisa; ?>"/>
                                        </label>
                                        <div class="direita">
                                            <button type="submit" class="icone icone-fenix btn btn-primary">PESQUISAR</button>
                                        </div>
                                    </form>
                                    <?php if(isset($_SESSION['msg'])){ ?>

                                        <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                            <?= ($_SESSION['msg']['error'] == 1 ? null : '<p class="negrito esquerda">Consulta Executada:</p>'); ?>
                                            <p id="query"><?= $_SESSION['msg']['message']; ?></p>
                                        </div>

                                    <?php } ?>
                                    <?php unset($_SESSION['msg']); ?>
                                    <table>
                                        <tr>
                                           <th>Nome</th>
                                           <th>E-mail</th>
                                       </tr>
                                       <?php foreach ($usuarios as $usuario) { ?>
                                        <tr>
                                           <td><?= $usuario->nome; ?></td>
                                           <td><?= $usuario->email; ?></td>
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
                                    <h1>UNION attacks</h1>
                                    <p>
                                        "Quando um aplicativo é vulnerável à injeção de SQL e os resultados da consulta são retornados nas respostas do aplicativo, a palavra-chave UNION pode ser usada para recuperar dados de outras tabelas no banco de dados. Isso resulta em um ataque UNION de injeção de SQL."
                                    </p>
                                    <p class="fonte">- PortSwigger (https://portswigger.net/web-security/sql-injection/union-attacks)</p>
                                    <h2>Restou alguma dúvida ?</h2>
                                    <p>
                                        Assista o episódio refêrente à falha, disponível no Youtube.
                                    </p>
                                    <a target="_blank" title="Youtube | Web Falhas | Union Attacks" href="https://youtu.be/A1PTEDnhM4U"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 2</button></a>
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
