<?php
include 'config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GreenColeta</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    


</head>

<body>

    <?php include 'layouts/app.php' ?>

    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center" style="color:#538D22">GreenColeta</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Uma forma mais verde de mudar o mundo!
                    </h5>
                </div>
                <div class="row center">
                    <nav>
                        <div class="nav-wrapper">
                            <form>
                                <div class="input-field">
                                    <input id="search" style="background-color: #538D22;color:white" type="search" placeholder="PESQUISE SUA CIDADE AQUI" required>
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
                <br><br>

            </div>
        </div>
        <div class="parallax"><img style="filter: blur(8px);-webkit-filter: blur(5px);" src="https://e1.pxfuel.com/desktop-wallpaper/378/922/desktop-wallpaper-1250x852px-google-maps-maps-google.jpg" alt="Unsplashed background img 1"></div>
    </div>


    <div class="section white">
        <div class="row container">
            <h3 class="header center">Objetivo</h3>
            <div class="row center">
                <h6 class="header col s12 light">Através do GreenColeta, buscamos oferecer uma solução prática e
                    acessível
                    para incentivar a reciclagem e melhorar a coleta seletiva de resíduos. O aplicativo
                    permitirá a conexão direta entre os usuários e as empresas de reciclagem locais,
                    facilitando o descarte correto dos materiais recicláveis e aumentando a eficiência na
                    separação dos resíduos.
                </h6>
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center" style="color: #538D22"><i class="material-icons">info</i></h2>
                            <h5 class="center">Conhecendo a Reciclagem</h5>

                            <p class="light">Oferecer informações detalhadas sobre os materiais que podem ser
                                reciclados e os processos corretos de separação e descarte, promovendo a conscientização
                                dos usuários.</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center" style="color: #538D22"><i class="material-icons">emoji_events</i></h2>
                            <h5 class="center">Reciclar é Ganhar</h5>

                            <p class="light">Incentivar a participação dos usuários por meio de programas de recompensa
                                e incentivos, como pontos acumulativos ou descontos em estabelecimentos parceiros.</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center" style="color: #538D22"><i class="material-icons">place</i></h2>
                            <h5 class="center">Encontre e Recicle</h5>

                            <p class="light">Implementar recursos de geolocalização no aplicativo para facilitar a
                                localização dos pontos de coleta e empresas de reciclagem mais próximas dos usuários.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img style="filter: blur(8px);-webkit-filter: blur(5px);" src="https://e1.pxfuel.com/desktop-wallpaper/378/922/desktop-wallpaper-1250x852px-google-maps-maps-google.jpg">
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });

    $(document).ready(function() {
        $('.sidenav').sidenav();
    });

    $(document).ready(function() {
        $('.parallax').parallax();
    });
</script>

</html>