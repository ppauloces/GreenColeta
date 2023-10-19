<?php

require_once 'config/auth.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GreenColeta | DADOS</title>
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
        <div class="row" style="margin-top: 20px;">
            <div class="col 12 m4 ">
                <div class="card">
                    <div class="card-image">
                        <img class="materialboxed" width="450" src="https://photografos.com.br/wp-content/uploads/2020/09/fotografia-para-perfil.jpg">
                        <a style="background-color: #538D22" class="btn-floating halfway-fab waves-effect waves-light"><i class="material-icons">edit</i></a>
                    </div>
                    <div class="card-content">
                        <h5 class="valign-wrapper left-align">
                            <i class="material-icons medium lime-text">emoji_events</i><b>Nível 3</b>
                        </h5>

                        <p>Cadastrado desde: <b><?= $data ?></b></p>
                        <p><b><?= $qnt['qnt'] ?></b> Coletas realizadas</p>
                    </div>
                </div>
            </div>
            <div class="col 2">

            </div>
            <div class="col 12 m6">
                <div class="row">
                    <form class="col s12 l12" method="POST" id="FormDados">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nome" type="text" name="nome" value="<?= $coletor['nome'] ?>" class="validate">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="nome" type="text" name="nome" value="<?= $coletor['identificador'] ?>" class="validate">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="email" type="email" name="email" value="<?= $coletor['email'] ?>" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="telefone" type="text" name="telefone" value="<?= $coletor['telefone'] ?>" class="validate phone_with_ddd">
                                <label for="telefone">Telefone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="cep" type="text" name="cep" value="<?= $coletor['cep'] ?>" class="validate cep">
                                <label for="cep">CEP</label>
                            </div>
                            <div class="input-field col s8">
                                <input id="rua" type="text" name="endereco" value="<?= $coletor['endereco'] ?>" class="validate">
                                <label for="rua">Endereço</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="cidade" type="text" name="cidade" value="<?= $coletor['cidade'] ?>" class="validate">
                                <label for="cidade">Cidade</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="bairro" type="text" name="bairro" value="<?= $coletor['bairro'] ?>" class="validate">
                                <label for="bairro">Bairro</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="uf" type="text" name="estado" value="<?= $coletor['estado'] ?>" class="validate">
                                <label for="uf">Estado</label>
                            </div>
                            <div class="input-field col s3">
                                <input id="numero" type="text" name="numero" value="<?= $coletor['numero'] ?>" class="validate">
                                <label for="numero">Número</label>
                            </div>
                        </div>

                        <div class="row">
                            <button style="background-color: #538D22" class="btn waves-effect waves-light" type="submit">ATUALIZAR
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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