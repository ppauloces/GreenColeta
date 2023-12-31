<?php

require_once 'config/auth.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GreenColeta | PAINEL</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include 'layouts/app.php';
    $cep = $coletor['cep'];
    $lista = $coletas->listaColetas($cep);
    $coletasVisualizadas = $coletas->coletasVisualizadas($coletor['id']);
    ?>
    <div class="container">
        <h3>Bom dia, <?= $coletor['nome'] ?></h3>
        <h6>Vamos verificar as solicitações do dia?</h6>

        <?php
        if (empty($lista)) {
            echo '<h6>Não há coletas disponíveis no momento.</h6>';
        } else {
            foreach ($lista as $col) {
                ?>
                <ul class="collection">
                    <li class="collection-item avatar">
                        <i class="material-icons circle blue">local_shipping</i>
                        <span class="title">Solicitação de coleta</span>
                        <p><?= $col['rua'] ?>, <?= $col['bairro'] ?>, <?= $col['numero'] ?> - <?= $col['cidade'] ?>, <?= $col['estado'] ?><br>
                            <a href="coleta.php?id=<?= $col['id'] ?>">Clique para obter as informações completas da coleta</a>
                        </p>
                    </li>
                </ul>
            <?php }
        }
        ?>

        <br><hr>
        <h4>Coletas já visualizadas</h4>

        <?php
        if (empty($coletasVisualizadas)) {
            echo '<h6>Você ainda não visualizou nenhuma coleta</h6>';
        } else {
            foreach ($coletasVisualizadas as $colv) {
                ?>
                <ul class="collection">
                    <li class="collection-item avatar">
                        <i class="material-icons circle blue">local_shipping</i>
                        <span class="title">Solicitação de coleta</span>
                        <p><?= $colv['rua'] ?>, <?= $colv['bairro'] ?>, <?= $colv['numero'] ?> - <?= $colv['cidade'] ?>, <?= $colv['estado'] ?><br>
                            <a href="coleta.php?id=<?= $colv['id'] ?>">Clique para obter as informações completas da coleta</a>
                        </p>
                        
                    </li>
                </ul>
            <?php }
        }
        ?>

    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();
            $('.materialboxed').materialbox();
            $('select').formSelect();
            $('.modal').modal();
            $('.tooltipped').tooltip();
        });
    </script>

</body>