<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../classes/Auth.php');

require_once $databasePath;

$db = new Database();
$auth = new Auth($db);

if ($auth->autenticarPorSessao()) {

    define('URL', 'http://localhost/greencoleta/auth/');

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

    define('URL', 'https://crudcomphp.com/login/');
    exit;
}
