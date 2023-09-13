<?php

header('Content-Type: application/json');

include_once '../classes/Cadastro.php';
include_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados do formulário AJAX
    $nome = $_POST['nome_inst'];
    $email = $_POST['email_inst'];
    $identifier = $_POST['identifier'];
    $telefone = $_POST['phone'];
    $senha = $_POST['password'];

    if (empty($nome) || empty($email) || empty($telefone) || empty($senha) || empty($identifier)) {
        $resposta = ['status' => 'error', 'mensagem' => 'Preencha todos os campos'];
        echo json_encode($resposta);
        die();
    }

    // Crie uma instância da classe de conexão
    $db = new Database();

    // Faça uma consulta para verificar se o email já está registrado
    $sqlCheckEmail = "SELECT COUNT(*) FROM coletor WHERE email = :email";
    $stmtCheckEmail = $db->getPdo()->prepare($sqlCheckEmail);
    $stmtCheckEmail->bindParam(':email', $email);
    $stmtCheckEmail->execute();
    $emailExistente = $stmtCheckEmail->fetchColumn();

    // Verifique se o email já existe
    if ($emailExistente > 0) {
        $resposta = ['status' => 'error', 'mensagem' => 'Esta conta já está registrada.'];
        echo json_encode($resposta);
        die();
    } else {

        if($_POST['password'] != $_POST['password_confirmation']){
            $resposta = ['status' => 'error', 'mensagem' => 'As senhas não são iguais'];  
            echo json_encode($resposta);
            die();
        }
        $cadastro = new Cadastro($db);

        // Chame o método de cadastro
        $resultado = $cadastro->cadastrarColetorEmpresa($nome, $email, $identifier, $telefone, $senha);

        // Verifique o resultado e envie uma resposta JSON
        if ($resultado) {
            $resposta = ['status' => 'success', 'mensagem' => 'Cadastro realizado com sucesso!', 'url' => 'http://localhost/greencoleta/coletor/'];
        } else {
            $resposta = ['status' => 'error', 'mensagem' => 'Erro no cadastro. Verifique suas credenciais'];
        }
    }
    echo json_encode($resposta);
    die();
} else {
    // Responda a solicitações não autorizadas (ou faça o que for necessário)
    http_response_code(401);
    echo "Acesso não autorizado";
}
