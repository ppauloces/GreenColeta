<?php

require_once 'config/auth.php';

$url = (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)) ? filter_input(INPUT_GET, 'url', FILTER_DEFAULT) : 'home');

$url = array_filter(explode('/', $url));
if (!isset($url[0])) {
    $url[0] = 'home';
}

$url[0] = htmlentities($url[0]);
$title = ucfirst($url[0]);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GreenColeta | <?= $title ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include 'layouts/app.php';


    if($url[0] == 'config'){
        $arquivo = 'config/' . $url[1] .'.php';
    }else{
        $arquivo = $url[0] . '.php';
    }
    

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
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();

        });
    </script>

</body>