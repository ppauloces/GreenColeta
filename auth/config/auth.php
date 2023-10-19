<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../classes/Auth.php');
$coletorClasse = realpath($dir . '/../classes/Coleta.php');
require_once $databasePath;
require_once $coletorClasse;

$db = new Database();
$auth = new Auth($db);
$coletas = new Coleta($db);

if ($auth->autenticarPorSessao()) {


    define('URL', 'http://localhost/greencoleta/auth/');
    define('URL_IMAGENS_UPLOAD', 'C:/xampp/htdocs/greencoleta/imagensColetas/');
    define('GET_IMAGEM', 'http://localhost/greencoleta/imagensColetas/');

    $user = $auth->getDetalhesUsuarioLogado();
    //verificar campos vazios
    if ($user) {
        $camposObrigatorios = ['endereco', 'bairro', 'cep', 'cidade', 'estado', 'numero'];
        $camposVazios = [];

        foreach ($camposObrigatorios as $campo) {
            if (empty($user[$campo])) {
                $camposVazios[] = $campo;
            }
        }

        if (!empty($camposVazios)) {
            $cardCamposVazios = '
            <div class="card-panel teal center col-md-6">
                    <a href="dados/" class="white-text">Você ainda não terminou de configurar sua conta. Clique aqui!
                </a>
            </div>';
        } else {
            $cardCamposVazios = '';
        }
    } else {
    }
} else {

    $auth->destruirSessaoEcookie();
    
    exit;
}
