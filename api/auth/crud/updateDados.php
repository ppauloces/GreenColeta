<?php


require_once '../config/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userClass = new User($db);

    if (
        empty($_POST['nome']) ||
        empty($_POST['email']) ||
        empty($_POST['telefone']) ||
        empty($_POST['cep']) ||
        empty($_POST['endereco']) ||
        empty($_POST['bairro']) ||
        empty($_POST['cidade']) ||
        empty($_POST['estado']) ||
        empty($_POST['numero'])
    ) {
        // Todos os campos estão vazios
        $resposta = ['status' => 'error', 'mensagem' => 'Preencha todos os campos'];
    } else {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $numero = intval($_POST['numero']);

        if ($userClass->updateDadosUsuario($user['id'], $nome, $email, $telefone, $cep, $endereco, $cidade, $estado, $numero, $bairro)) {
            $resposta = ['status' => 'success', 'mensagem' => 'Dados atualizados com sucesso!'];
        } else {
            $resposta = ['status' => 'error', 'mensagem' => 'Falha ao atualizar os dados'];
            exit();
        }
    }
    header('Content-Type: application/json');
    echo json_encode($resposta);
}
