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

    <?php include '../layouts/app.php' ?>
    <div class="container" style="margin-top:10px;">

        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card-panel z-depth-5">
                    <h4 class="center">Criar conta</h4>
                    <div class="row">
                        <div class="row center">
                            <div class="input-field col s6">
                                <p>
                                    <label id="label-usuario">
                                        <input name="group" id="usuario" value="usuario" type="radio" class="with-gap" />
                                        <span>Eu vou registrar as coletas</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s6">
                                <p>
                                    <label id="label-coletor">
                                        <input name="group" id="coletor" value="coletorRadio" type="radio" class="with-gap">
                                        <span>Eu vou coletar</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <form class="col s12 m12" id="form1" method="POST">
                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons">account_circle</i>
                                    <input id="icon_prefix" type="text" name="nome" class="validate">
                                    <label for="icon_prefix">Seu nome</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">mail</i>
                                    <input id="icon_email" type="email" name="email" class="validate">
                                    <label for="icon_email">Seu email</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">call</i>
                                    <input id="icon_email" type="text" name="telefone" class="validate tel">
                                    <label for="icon_email">Telefone</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">lock</i>
                                    <input id="icon_password" type="password" name="senha" class="validate">
                                    <label for="icon_password">Sua senha</label>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light center" type="submit" name="action">Criar conta<i class="fa fa-sign-in right"></i></button>
                        </form>
                        <form class="col s12 m12" id="form2" action="{{ route('register.collector') }}" method="post" style="display: none">

                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons">domain</i>
                                    <input id="icon_prefix" name="name" type="text" class="validate @error('name') invalid @enderror ">
                                    <label for="icon_prefix">Nome da Instituição ou seu nome</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">mail</i>
                                    <input id="icon_email" name="email" type="email" class="validate ">
                                    <label for="icon_email">Email da Instituição ou seu email</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">badge</i>
                                    <input id="icon_email" name="identifier" type="text" class="validate " maxlength="20">
                                    <label for="icon_email">CNPJ / ou CPF (apenas numeros)</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">call</i>
                                    <input id="icon_email" name="phone" type="text" class="validate tel ">
                                    <label for="icon_email">Telefone</label>
                                </div>

                                <div class="row" style="margin-left:12px">
                                    <div class="input-field col s12 m6">
                                        <select name="states" id="states"></select>
                                    </div>

                                    <div class="input-field col s12 m6">
                                        <select name="cities" id="cities"> </select>
                                    </div>
                                </div>

                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">lock</i>
                                    <input id="icon_password" name="password" type="password" class="validate @error('password') invalid @enderror">
                                    <label for="icon_password">Senha</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">lock</i>
                                    <input id="icon_password" name="password_confirmation" type="password" class="validate @error('password') invalid @enderror">
                                    <label for="icon_password">Confirmar Senha</label>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light center" type="submit" name="action">Criar
                                conta<i class="fa fa-sign-in right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mensagem"></div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="../assets/register.js"></script>

    <script>
        $(document).ready(function() {
            $("#form1").submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: '../crud/cadastro.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        if (data.status === 'success') {
                            M.toast({
                                html: '<i class="material-icons">error</i>&nbspCadastro realizado com sucesso!',
                                classes: 'light-green darken-2'
                            });
                            setTimeout(function() {
                                window.location.href = data.url;
                            }, 2000);
                            
                        } else if (data.status === 'error') {
                            M.toast({
                                html: '<i class="material-icons">error</i>&nbsp' + data.mensagem,
                                classes: 'lime darken-4'
                            });
                        }
                    },

                });
            });
        });
    </script>
</body>

</html>