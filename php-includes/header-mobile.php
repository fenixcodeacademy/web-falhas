<div class="container main_menu-mobile">
    <div class="content">
        <div class="ds-flex space-between">
            <div class="logo"></div>
            <div id="menu-mobile"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">

    window.addEventListener("load", function() {

        let menu = document.getElementById("menu-mobile");
        menu.addEventListener("click", function() {

            var menuContainer = document.querySelector(".main_menu-mobile");
            var menuDesktop = document.querySelector(".menu-desktop");
            var logo = document.querySelector(".logo");
            if (this.classList.contains("active")) {

                menuContainer.classList.remove("active");
                this.classList.remove("active");
                menuDesktop.classList.remove('active');
                logo.classList.remove('active');

            }else {

                menuContainer.classList.add('active');
                menuDesktop.classList.add('active');
                logo.classList.add('active');
                this.classList.add('active');

            }

        });

        var sublinks = document.querySelectorAll(".sub");
        for (var i = 0; i < sublinks.length; i++) {
            sublinks[i].addEventListener("click", function(e) {

                e.preventDefault();

                let id = this.getAttribute("href");
                var submenu = document.querySelector(id);

                if (this.classList.contains("active")) {

                    this.classList.remove("active");
                    submenu.classList.remove("active");

                }else {

                    submenu.classList.add("active");
                    this.classList.add("active");

                }

            });
        }

    });

</script>
