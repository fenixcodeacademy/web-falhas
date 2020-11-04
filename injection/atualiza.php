<?php
require_once "../php-includes/config.php";


$id = $_GET['id'];

try {

    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // FORMA ERRADA
    $query = "SELECT * FROM usuario WHERE id = $id";
    $stmt = $conn->query($query);
    $usuario = $stmt->fetchObject();

    /* FORMA CORRETA !

    $conn = new PDO('sqlite:../database/banco.sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM usuario WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetchObject();

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
                    <div class="container main_login">
                        <div class="content">
                            <div class="ds-flex">
                                <form class="form-padrao" action="atualiza-action.php" method="post">
                                    <h1>Atualize Informações</h1>
                                    <p>Editando Informações de <b>"<?= $usuario->nome; ?>"</b></p>
                                    <label for="email">
                                        <span>Nome:</span>
                                        <input required class="icone icone-user" placeholder="Seu Nome" type="text" name="nome" value="<?= $usuario->nome; ?>"/>
                                    </label>
                                    <label for="email">
                                        <span>E-mail:</span>
                                        <input required class="icone icone-email" placeholder="Seu e-mail" type="email" name="email" value="<?= $usuario->email; ?>"/>
                                    </label>
                                    <label for="email">
                                        <span>Endereço:</span>
                                        <input required class="icone icone-localizacao" placeholder="Seu endereço" type="text" name="endereco" value="<?= $usuario->endereco; ?>"/>
                                    </label>
                                    <label for="email">
                                        <span>Complemento:</span>
                                        <input required class="icone icone-localizacao" placeholder="Complemento" type="text" name="complemento" value="<?= $usuario->complemento; ?>"/>
                                    </label>
                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                    <div class="direita">
                                        <button type="submit" class="icone icone-fenix btn btn-primary">SALVAR</button>
                                    </div>
                                    <?php if(isset($_SESSION['msg'])){ ?>

                                        <div class="session-message <?= ($_SESSION['msg']['error'] == 1 ? 'error' : 'success'); ?>">
                                            <p><?= $_SESSION['msg']['message']; ?></p>
                                        </div>

                                    <?php } ?>
                                    <?php unset($_SESSION['msg']); ?>
                                </form>
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
                                    <a target="_blank" title="Youtube | Web Falhas | BLIND SQL Injection" href="https://youtu.be/N2AmQJtGvFM"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 2</button></a>
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
