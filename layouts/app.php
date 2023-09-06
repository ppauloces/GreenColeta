<div class="content">
    <nav style="background-color: #538D22">
        <div class="nav-wrapper container">
            <a href="http://localhost/greencoleta/" class="brand-logo"><i class="material-icons">recycling</i>GreenColeta</a>
            <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <?php
            if ($_SERVER['REQUEST_URI'] != '/greencoleta/signup/' && $_SERVER['REQUEST_URI'] != '/greencoleta/login/') {
            ?>
                <ul class="right hide-on-med-and-down">
                    <li><a href="login/" class=""><i class="material-icons left" style="margin-right: 5px;">person</i>ENTRAR</a></li>
                    <li><a href="signup/" class=""><i class="material-icons left" style="margin-right: 5px;">person_add</i>CRIAR CONTA</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </nav>
    <?php
    if ($_SERVER['REQUEST_URI'] != '/greencoleta/signup/' && $_SERVER['REQUEST_URI'] != '/greencoleta/login/') {
    ?>
        <ul class="sidenav" id="mobile-demo">
            <li><a href="login/" class=""><i class="material-icons left" style="margin-right: 5px;">person</i>ENTRAR</a></li>
            <li><a href="signup/" class=""><i class="material-icons left" style="margin-right: 5px;">person_add</i>CRIAR CONTA</a></li>
        </ul>
    <?php
    }
    ?>
</div>