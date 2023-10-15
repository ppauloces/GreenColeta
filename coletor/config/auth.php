<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../classes/Auth.php');

require_once $databasePath;

$db = new Database();
$auth = new Auth($db);

if ($auth->autenticarPorSessao()) {

    define('URL', 'http://localhost/greencoleta/coletor/');

    $coletor = $auth->getDetalhesColetorLogado();
}else{
    $auth->destruirSessaoEcookie();
}


