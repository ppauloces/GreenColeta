<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../classes/Auth.php');
$coletaPath = realpath($dir . '/../classes/Coleta.php');

require_once $databasePath;
require_once $coletaPath;

$db = new Database();
$auth = new Auth($db);
$coletas = new Coleta($db);

if ($auth->autenticarPorSessao()) {

    define('URL_IMAGENS_UPLOAD', 'C:/xampp/htdocs/greencoleta/imagensColetas/');
    define('GET_IMAGEM', 'http://localhost/greencoleta/imagensColetas/');
    define('URL', 'http://localhost/greencoleta/coletor/');

    
    $coletor = $auth->getDetalhesColetorLogado();
}else{
    $auth->destruirSessaoEcookie();
}


