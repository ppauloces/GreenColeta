<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../classes/Auth.php');

require_once $databasePath;

$db = new Database();
$auth = new Auth($db);

$auth->destruirSessaoEcookie();

header('Location: http://localhost/greencoleta/login/');

// Redirecione o usuário para a página de login

