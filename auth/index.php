<?php

require_once 'config/auth.php';

$url = (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)) ? filter_input(INPUT_GET, 'url', FILTER_DEFAULT) : 'home');

$url = array_filter(explode('/', $url));
if (!isset($url[0])) {
    $url[0] = 'home';
}

if (empty($url[0]) || $url[0] == 'index') {
    header("Location: home"); // Redireciona o usuário para a página inicial
    exit;
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
    <link rel="stylesheet" href="assets/css/main.css">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
</head>

<body>

    <?php
    include 'layouts/app.php';



    if ($url[0] == 'config') {
        $arquivo = 'config/' . $url[1] . '.php';
    } else {

        $arquivo = $url[0] . '.php';
        if (isset($url[1]) && is_numeric($url[1])) {
            $get = $url[1];
        } else {
            $get = '';
        }

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
    <script src="<?= URL . 'assets/js/jquery.mask.min.js' ?>"></script>
    <script src="<?= URL . 'assets/js/mask.js' ?>"></script>
    <script src="<?= URL . 'assets/js/viacep.js' ?>"></script>
    <?php
    if ($url[0] == 'home' || $url[0] == '') {
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
            $('.tooltipped').tooltip();
        });

        $('#tutorial').click(function() {
            $('#modaltutorial').modal('open');
        });

        $(document).ready(function() {
    // Capture o evento de alteração do checkbox
            $('#usarEnderecoAtualCheckbox').change(function() {
        // Verifique se o checkbox está marcado
                if ($(this).is(':checked')) {

            // Desabilite os inputs dentro da div "endereco"
                    $('#endereco input').prop('disabled', true);
                    $('#cep').val('<?= $user['cep'] ?>')
                    $('label[for="cep"]').addClass('active');
                    $('#rua').val('<?= $user['endereco'] ?>')
                    $('label[for="rua"]').addClass('active');
                    $('#bairro').val('<?= $user['bairro'] ?>')
                    $('label[for="bairro"]').addClass('active');
                    $('#cidade').val('<?= $user['cidade'] ?>')
                    $('label[for="cidade"]').addClass('active');
                    $('#uf').val('<?= $user['estado'] ?>')
                    $('label[for="uf"]').addClass('active');
                    $('#numero').val('<?= $user['numero'] ?>')
                    $('label[for="numero"]').addClass('active');
                } else {
            // Habilite os inputs dentro da div "endereco"
                    $('#endereco input').prop('disabled', false);
                    $('#cep').val('')
                    $('label[for="cep"]').removeClass('active');
                    $('#rua').val('')
                    $('label[for="rua"]').removeClass('active');
                    $('#bairro').val('')
                    $('label[for="cidade"]').removeClass('active');
                    $('#cidade').val('')
                    $('label[for="bairro"]').removeClass('active');
                    $('#uf').val('')
                    $('label[for="uf"]').removeClass('active');
                    $('#numero').val('')
                    $('label[for="numero"]').removeClass('active');
                }
            });
        });


         //ajax para adicionar nova coleta
        $("#novaColeta").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var selectedCheckboxes = $("input[name='tipo[]']:checked"); // Seleciona os checkboxes marcados

            selectedCheckboxes.each(function() {
                formData.append("tipo[]", $(this).val()); // Adiciona cada valor ao FormData
            });

            // Verifique se o checkbox "Usar seu endereço atual" está marcado e defina "enderecoAtual" de acordo.
            var enderecoAtualCheckbox = $("#usarEnderecoAtualCheckbox");
            formData.append("enderecoAtual", enderecoAtualCheckbox.is(":checked") ? "true" : "false");
            $.ajax({
                url: 'crud/addColeta.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
            processData: false,  // Não processar dados
            contentType: false,
            cache:false,
            success: function(data) {
             if (data.status === 'success') {
                M.toast({
                    html: '<i class="material-icons">check</i>&nbsp' + data.mensagem,
                    classes: 'light-green darken-2'
                });
                $('#modal1').modal('close');
            } else if (data.status === 'error') {
                M.toast({
                    html: '<i class="material-icons">error</i>&nbsp' + data.mensagem,
                    classes: 'lime darken-4'
                });
                $('#modal1').modal('close');
            }
        },
        error: function(xhr, status, error) {
                // Manipule erros de comunicação com o servidor aqui
            console.error(xhr);
            console.error(status);
            console.error(error);
            M.toast({
                html: '<i class="material-icons">error</i>&nbspErro de comunicação com o servidor',
                classes: 'red darken-2'
            });
        }
    });

        });
    </script>

    <script>

    </script>
</body>