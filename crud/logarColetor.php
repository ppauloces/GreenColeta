<?php

header('Content-Type: application/json');

include_once '../classes/Login.php';
include_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $db = new Database();
    $loginValidator = new Login($db);

    // Obtenha os dados do form
    $email = $_POST['email'];
    $senha = $_POST['password'];

    if (empty($email) || empty($senha)) {
        $resposta = ['status' => 'error', 'mensagem' => 'Preencha todos os campos'];
        echo json_encode($resposta);
        die();
    }

    $coletorId = $loginValidator->validarColetor($email, $senha);

    if ($coletorId) {
        // Credenciais válidas, faça o login e redirecione para a página autenticada
        session_start();
        $_SESSION['coletor_id'] = $coletorId;
        $resposta = ['status' => 'success', 'mensagem' => 'Login realizado com sucesso!', 'url' => 'http://localhost/greencoleta/coletor/'];
    } else {
        // Credenciais inválidas, exiba uma mensagem de erro
        $resposta = ['status' => 'error', 'mensagem' => 'Erro no login. Verifique suas credenciais'];
    }
    echo json_encode($resposta);
} else {
    // Responda a solicitações não autorizadas (ou faça o que for necessário)
    http_response_code(401);
    echo "Acesso não autorizado";
}
