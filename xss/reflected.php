<?php

require_once "../php-includes/config.php";

if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {

    /* FORMA CORRETA

    $pesquisa = htmlentities($_GET['pesquisa'], ENT_QUOTES, 'UTF-8');

    */

    // FORMA ERRADA
    $pesquisa = $_GET['pesquisa'];

    try {

        // CONEXÃO
        $conn = new PDO('sqlite:../database/banco.sql');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT * FROM usuario WHERE nome LIKE :pesquisa';
        $stmt = $conn->prepare($query);
        $search = "%".$pesquisa."%";
        $stmt->bindParam(':pesquisa', $search);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);

    } catch (\Exception $e) {

        echo $e->getMessage();

    }

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
                    <div class="container main_pesquisa">
                        <div class="content">
                            <form class="form-padrao" action="reflected.php" method="get">
                                <h1>Pesquisar Usuários</h1>
                                <label for="pesquisa">
                                    <input required class="icone icone-pesquisa" autocomplete="off" placeholder="nome do usuário" type="text" name="pesquisa" value="<?= $usuario->nome; ?>"/>
                                </label>
                                <div class="direita">
                                    <button type="submit" class="icone icone-fenix btn btn-primary">PESQUISAR</button>
                                </div>
                            </form>
                            <div id="table">
                                <?php if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) { ?>
                                <h1>Resultados para: "<?= $pesquisa; ?>"</h1>
                                <table>
                                    <?php foreach ($resultados as $usuario) { ?>
                                    <tr>
                                       <th>Nome</th>
                                       <th>E-mail</th>
                                   </tr>
                                    <tr>
                                       <td><?= $usuario->nome; ?></td>
                                       <td><?= $usuario->email; ?></td>
                                   </tr>
                                    <?php } ?>
                                </table>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="container main_pesquisa">
                        <div class="content">
                            <div class="box-message">
                                <h1>XSS (Reflected)</h1>
                                <p>
                                    "Ataques refletidos são aqueles em que o script injetado é
                                    refletido no servidor da Web, como em uma mensagem de erro,
                                    resultado de pesquisa ou qualquer outra resposta que inclua parte
                                    ou todas as entradas enviadas ao servidor como parte da
                                    solicitação..."
                                </p>
                                <p class="fonte">- OWASP (https://owasp.org/www-community/attacks/SQL_Injection)</p>
                                <h2>Informações Adicionais</h2>
                                <p>
                                    Depois do ataque você pode restaurar o laborátorio para testar novamente.
                                </p>
                                <h2>Restou alguma dúvida ?</h2>
                                <p>
                                    Assista o episódio referente a essa falha, disponível no Youtube.
                                </p>
                                <a target="_blank" title="Youtube | Web Falhas | XSS Reflected" href="https://youtu.be/ZQfDuoTkQTE"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 3</button></a>
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
