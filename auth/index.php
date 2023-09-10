<?php

require_once 'config/auth.php';

$url = (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)) ? filter_input(INPUT_GET, 'url', FILTER_DEFAULT) : 'home');

$url = array_filter(explode('/', $url));
if (!isset($url[1])) {
    $url[1] = 'home';
}

$url[1] = htmlentities($url[1]);
$title = ucfirst($url[1]);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GreenColeta | <?= $title ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
</head>

<body>

    <?php
    include 'layouts/app.php';



    $arquivo = $url[1] . '.php';

    if (file_exists($arquivo)) {
        include $arquivo;
    } else {
        // Trate o caso em que o arquivo não existe
        include '404.php';
    }

    ?>



    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="<?= URL . 'assets/js/jquery.mask.min.js' ?>"></script>
    <script src="<?= URL . 'assets/js/mask.js' ?>"></script>
    <script src="<?= URL . 'assets/js/viacep.js' ?>"></script>
    <?php
    if ($url[1] == 'home' || $url[1] == '') {
    ?>
        <script src="<?= URL . 'assets/js/mapbox.js' ?>"></script>
    <?php
    }
    ?>
    <script src="<?= URL . 'assets/js/ajax.js' ?>"></script>


    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();
            $('.materialboxed').materialbox();
            $('select').formSelect();
            $('.modal').modal();
        });

        $('#tutorial').click(function() {
            $('#modaltutorial').modal('open');
        });

    </script>
</body>