<?php

require_once 'classes/Auth.php';

$db = new Database();
$auth = new Auth($db);  

if($auth->autenticarPorToken($_SESSION['user_token'])){
    echo 'Usuario autenticado';
}else{
    echo 'Usuário não autenticado';
}
