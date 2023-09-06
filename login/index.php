

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
                    <h4 class="center">Entrar</h4>
                    <div class="row">
                        <div class="row center">
                            <div class="input-field col s6">
                                <p>
                                    <label id="label-usuario">
                                        <input name="group" id="usuario" value="usuario" type="radio" class="with-gap" />
                                        <span>Sou usuário</span>
                                    </label>
                                </p>
                            </div>
                            <div class="input-field col s6">
                                <p>
                                    <label id="label-coletor">
                                        <input name="group" id="coletor" value="coletorRadio" type="radio" class="with-gap">
                                        <span>Sou coletor</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <form class="col s12 m12" id="form1">
                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">mail</i>
                                    <input id="icon_email" type="email" class="validate">
                                    <label for="icon_email">Seu email</label>
                                </div>

                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">lock</i>
                                    <input id="icon_password" type="password" class="validate">
                                    <label for="icon_password">Sua senha</label>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light center" type="submit" name="action">LOGIN<i class="fa fa-sign-in right"></i></button>
                        </form>
                        <form class="col s12 m12" id="form2" style="display: none;">
                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">mail</i>
                                    <input id="icon_email" type="email" class="validate">
                                    <label for="icon_email">Seu email</label>
                                </div>

                                <div class="input-field col s12 m12">
                                    <i class="mdi-action-account-circle prefix material-icons ">lock</i>
                                    <input id="icon_password" type="password" class="validate">
                                    <label for="icon_password">Sua senha</label>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light center" type="submit" name="action">LOGIN<i class="fa fa-sign-in right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
    <script src="../assets/register.js"></script>
</body>

</html>