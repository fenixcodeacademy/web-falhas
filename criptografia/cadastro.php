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
                                <form class="form-padrao" action="cadastro-action.php" method="post">
                                    <h1>Cadastro</h1>
                                    <label for="email">
                                        <span>Nome:</span>
                                        <input required autocomplete="off" class="icone icone-user" placeholder="Seu Nome" type="text" name="nome" value="<?= $usuario->nome; ?>"/>
                                    </label>
                                    <label for="email">
                                        <span>E-mail:</span>
                                        <input required autocomplete="off" class="icone icone-email" placeholder="Seu E-mail" type="email" name="email" value="<?= $usuario->email; ?>"/>
                                    </label>
                                    <label for="endereço">
                                        <span>Endereço:</span>
                                        <input required autocomplete="off" class="icone icone-localizacao" placeholder="Seu Endereço" type="text" name="endereco" value="<?= $usuario->endereco; ?>"/>
                                    </label>
                                    <label for="complemento">
                                        <span>Complemento:</span>
                                        <input required autocomplete="off" class="icone icone-localizacao" placeholder="Complemento" type="text" name="complemento" value="<?= $usuario->complemento; ?>"/>
                                    </label>
                                    <label for="senha">
                                        <span>Senha:</span>
                                        <input required autocomplete="off" class="icone icone-password" placeholder="********" type="password" name="senha" value="<?= $usuario->complemento; ?>"/>
                                    </label>
                                    <label for="senha">
                                        <span>Confirme sua Senha:</span>
                                        <input required autocomplete="off" class="icone icone-password" placeholder="********" type="password" name="confirmacao_senha" value="<?= $usuario->complemento; ?>"/>
                                    </label>
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
