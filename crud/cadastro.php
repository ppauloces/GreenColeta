<?php

header('Content-Type: application/json');

include_once '../classes/Cadastro.php';
include_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados do formulário AJAX
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    if (empty($nome) || empty($email) || empty($telefone) || empty($senha)) {
        $resposta = ['status' => 'error', 'mensagem' => 'Preencha todos os campos'];
        echo json_encode($resposta);
        die();
    }

    // Crie uma instância da classe de conexão
    $db = new Database();

    // Faça uma consulta para verificar se o email já está registrado
    $sqlCheckEmail = "SELECT COUNT(*) FROM usuario WHERE email = :email";
    $stmtCheckEmail = $db->getPdo()->prepare($sqlCheckEmail);
    $stmtCheckEmail->bindParam(':email', $email);
    $stmtCheckEmail->execute();
    $emailExistente = $stmtCheckEmail->fetchColumn();

    // Verifique se o email já existe
    if ($emailExistente > 0) {
        $resposta = ['status' => 'error', 'mensagem' => 'Esta conta já está registrada.'];
    } else {
        $cadastro = new Cadastro($db);

        // Chame o método de cadastro
        $token = $cadastro->cadastrarUsuario($nome, $email, $telefone, $senha);

        // Verifique o resultado e envie uma resposta JSON
        if ($token) {
            $resposta = ['status' => 'success', 'mensagem' => 'Cadastro realizado com sucesso!', 'url' => 'http://localhost/greencoleta/auth/'];
        } else {
            $resposta = ['status' => 'error', 'mensagem' => 'Erro no cadastro. Tente novamente mais tarde'];
        }
    }
    echo json_encode($resposta);
} else {
    // Responda a solicitações não autorizadas (ou faça o que for necessário)
    http_response_code(401);
    echo "Acesso não autorizado";
}
