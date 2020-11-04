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
                    <div class="container main_content">
                        <div class="content">
                            <h1>Apache</h1>
                            <p>O Projeto do Servidor HTTP Apache é um esforço para desenvolver e manter um servidor HTTP de código aberto para sistemas operacionais modernos, incluindo UNIX e Windows. O objetivo deste projeto é fornecer um servidor seguro, eficiente e extensível que forneça serviços HTTP em sincronia com os padrões HTTP atuais.</p>
                            <p><a target="_blank" href="https://httpd.apache.org/" class="link-cinza">- https://httpd.apache.org/</a></p>
                            <h1>.htaccess</h1>
                            <p>
                                O .htaccess é o arquivo oculto de configuração de acesso a sua aplicação web. Com ele podemos fazer a segurança de diretórios, arquivos e url's especificas, mas sem uma configuração adequada, você pode abrir brechas em sua aplicação para vários tipos de falhas envolvendo acesso a caminhos e arquivos do sistema.
                            </p>
                            <h1>httpd.conf/apache2.conf</h1>
                            <p>
                                Da mesma forma que podemos inserir regras de acesso no arquivo .htaccess, também podemos fazer isso no arquivo httpd.conf/apache2.conf. Você pode encontra-lo em locais diferentes, e com nome diferente, dependendo do seu sistema. No Linux por exemplo (Distribuição Debian), ele se encontra em "/etc/apache2/apache2.conf". Mas no Windows
                                usando o XAMPP ele se encontra em "C:/xampp/htdocs/apache/conf/httpd.conf".
                            </p>
                            <h1>Exemplo de falhas no Laboratório:</h1>
                            <p>
                                <a class="link" href="http://localhost/web-falhas/img/" target="_blank">http://localhost/web-falhas/img/</a>
                            </p>
                            <p>- Na URL acima, é listado imagens pertencentes ao laboratório. Uma falha como essa pode expor arquivos de usuários ou arquivos do sistema.</p>
                            <p>
                                <a class="link" href="http://localhost/web-falhas/php-includes/" target="_blank">http://localhost/web-falhas/php-includes/</a>
                            </p>
                            <p>- Na URL acima, é listado arquivos PHP pertencentes ao sistema.</p>
                            <p>
                                <a class="link" href="http://localhost/web-falhas/database/banco.sql" target="_blank">http://localhost/web-falhas/database/banco.sql</a>
                            </p>
                            <p>- Na URL acima, é possivel baixar o banco de dados do laboratório diretamente pela url.</p>
                            <h1>Soluções</h1>
                            <p>Para impedir a listagem de diretório: <strong>(.htaccess)</strong></p>
                            <pre>
                                <span>Options -Indexes</span>
                            </pre>
                            <p>Para impedir a listagem de diretório: <strong>(<strong>httpd.conf/apache2.conf</strong>)</strong></p>
                            <pre>
                                <span><xmp><Directory /var/www/html/web-falhas/></xmp></span>
                                <span>    Options -Indexes</span>
                                <span><xmp></Directory></xmp></span>
                            </pre>
                            <p>Adicione o código abaixo para bloquear o acesso direto ao arquivo desejado: <strong>(.htaccess)</strong></p>
                            <pre>
                                <span><xmp><Files "banco.sql"></xmp></span>
                                    <span>    Require all denied</span>
                                <span><xmp></Files></xmp></span>
                            </pre>
                            <p>Adicione o código abaixo para bloquear o acesso direto ao arquivo desejado: <strong>(<strong>httpd.conf/apache2.conf</strong>)</strong></p>
                            <pre>
                                <span><xmp><Directory /var/www/html/web-falhas/></xmp></span>
                                <span><xmp>        <Files "banco.sql"></xmp></span>
                                <span><xmp>                Require all denied</xmp></span>
                                <span><xmp>        </Files></xmp></span>
                                <span><xmp></Directory></xmp></span>
                            </pre>
                            <h1>Dicas</h1>
                            <p>Prefira utilizar o arquivo httpd.conf/apache2.conf por causa do aumento de performance. O arquivo .htaccess é recarregado toda vez que uma pagina é exibida, já o arquivo httpd.conf/apache2.conf é carregado apenas uma vez.</p>
                            <div class="clear"></div>
                        </div>
                        <div class="container main_pesquisa">
                            <div class="content">
                                <div class="box-message">
                                    <h1>Restou alguma dúvida ?</h1>
                                    <p>
                                        Assista o episódio referente a essa falha, disponível no Youtube.
                                    </p>
                                    <a target="_blank" title="Youtube | Web Falhas | Apache" href="https://youtu.be/AfT9ZaTDba0"><button type="submit" class="btn btn-primary icone icone-youtube" name="button">Episódio 4</button></a>
                                </div>
                                <div class="clear"></div>
                            </div>
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
