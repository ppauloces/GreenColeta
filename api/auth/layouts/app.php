<div class="content">

    <nav style="background-color: #538D22">
        <div class="nav-wrapper container">
            <a href="<?= URL ?>" class="brand-logo"><i class="material-icons hide-on-med-and-down">recycling</i>GreenColeta</a>
            <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">

                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons left" style="margin-right: 5px;">person</i>Perfil<i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?= URL . 'dados' ?>" style="color: #538D22"><i class="material-icons left" style="margin-right: 5px;color: #538D22">info_outline</i>Dados</a></li>
        <li><a href="#!" style="color: #538D22"><i class="material-icons left" style="margin-right: 5px;color: #538D22">history</i>Histórico</a></li>
        <li class="divider"></li>
        <li><a href="<?= URL . 'config/logout.php' ?>" style="color: red"><i class="material-icons left" style="margin-right: 5px;color: red">exit_to_app</i>Sair</a></li>
    </ul>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="<?= URL . 'dados' ?>" style="color: #538D22"><i class="material-icons left" style="margin-right: 5px;color: #538D22">info_outline</i>Dados</a></li>
        <li><a href="#!" style="color: #538D22"><i class="material-icons left" style="margin-right: 5px;color: #538D22">history</i>Histórico</a></li>
        <li class="divider"></li>
        <li><a href="<?= URL . 'config/logout.php' ?>" style="color: red"><i class="material-icons left" style="margin-right: 5px;color: red">exit_to_app</i>Sair</a></li>
    </ul>
</div>