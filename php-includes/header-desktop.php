<header class="container main_menu">
    <div class="content">
        <div class="ds-flex">
            <ul>
                <a class="icone-fenix negrito" href="<?= URL_BASE; ?>">
                    <li>Fênix Code Academy</li>
                </a>
                <a class="icone-injection sub" href="#injection">
                    <li>INJECTION</li>
                    <div class="seta"></div>
                </a>
                <div class="sub-menu" id="injection">
                    <a class="icone-option" href="<?= URL_BASE; ?>/injection/login.php">
                        <span class="cinza negrito">AMBIENTE 1</span>
                        <span>SQL INJECTION</span>
                    </a>
                    <a class="icone-option" href="<?= URL_BASE; ?>/injection/usuarios.php">
                        <span class="cinza negrito">AMBIENTE 2</span>
                        <span>BLIND / SQL INJECTION</span>
                    </a>
                    <a class="icone-option" href="<?= URL_BASE; ?>/injection/pesquisa.php">
                        <span class="cinza negrito">AMBIENTE 3</span>
                        <span>UNION attacks / BLIND</span>
                    </a>
                </div>
                <a class="icone-xss sub" href="#xss">
                    <li>XSS</li>
                    <div class="seta"></div>
                </a>
                <div class="sub-menu" id="xss">
                    <a class="icone-option" href="<?= URL_BASE; ?>/xss/reflected.php">
                        <span class="cinza negrito">AMBIENTE 1</span>
                        <span>REFLECTED</span>
                    </a>
                    <a class="icone-option" href="<?= URL_BASE; ?>/xss/dom-based.php?default=Italiano">
                        <span class="cinza negrito">AMBIENTE 2</span>
                        <span>DOM BASED</span>
                    </a>
                    <a class="icone-option" href="<?= URL_BASE; ?>/xss/stored.php">
                        <span class="cinza negrito">AMBIENTE 3</span>
                        <span>STORED</span>
                    </a>
                </div>
                <a class="icone-apache" href="<?= URL_BASE; ?>/apache/apache.php">
                    <li>APACHE</li>
                </a>
                <a class="icone-upload" href="<?= URL_BASE; ?>/upload/upload.php">
                    <li>SHELL UPLOAD</li>
                </a>
                <a class="icone-hash sub" href="#criptografia">
                    <li>CRIPTOGRAFIA</li>
                    <div class="seta"></div>
                </a>
                <div class="sub-menu" id="criptografia">
                    <a class="icone-option" href="<?= URL_BASE; ?>/criptografia/cadastro.php">
                        <span class="cinza negrito">AMBIENTE 1</span>
                        <span>CADASTRO</span>
                    </a>
                    <a class="icone-option" href="<?= URL_BASE; ?>/criptografia/usuarios.php">
                        <span class="cinza negrito">AMBIENTE 2</span>
                        <span>USUÁRIOS</span>
                    </a>
                    <a class="icone-option" href="<?= URL_BASE; ?>/criptografia/login.php">
                        <span class="cinza negrito">AMBIENTE 3</span>
                        <span>LOGIN</span>
                    </a>
                </div>
            </ul>
            <ul>
                <a class="icone-restaurar" id="restaurar" href="#criptografia">
                    <li>RESTAURAR LABORATÓRIO</li>
                </a>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</header>
<script type="text/javascript">

    let restaurar = document.getElementById('restaurar');
    restaurar.addEventListener("click", function() {

        var modal = document.querySelector(".modal-container");
        if (modal) {

            modal.remove();

        }else {

            let modal = document.createElement("div");
            modal.className = 'modal-container';

            let html = "<div class='modal-content'>";
            html += "<div id='fechar'>X</div>";
            html += "<h1>Restaurar</h1>";
            html += "<p>Você está prestes a restaurar o laboratório, todas as alterações serão desfeitas e o laboratório voltara para as configurações padrões.</p>";
            html += "<a title='Restaurar' href='<?= URL_BASE; ?>/restaurar.php'><button class='btn btn-secundary icone icone-restaurar'>Restaurar</button></a>";
            html += "</div>";
            modal.innerHTML = html;

            document.body.appendChild(modal);

            let fechar = document.getElementById("fechar");
            fechar.addEventListener("click", function() {

                let modal = document.querySelector(".modal-container");
                modal.remove();

            });

            let container = document.querySelector(".modal-container");
            container.addEventListener("click", function(e) {

                if (e.target.className == 'modal-container') {

                    let modal = document.querySelector(".modal-container");
                    modal.remove();

                }

            });

        }

    });

</script>
