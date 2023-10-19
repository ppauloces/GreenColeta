<?php
require_once '../config/auth.php';
require_once '../classes/Coleta.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['id_coleta'])) {
        $resposta = ['status' => 'error', 'mensagem' => 'ERRO'];
        echo json_encode($resposta);
    } else {
        $resultado = $coletas->aceitarColeta($_POST['id_coleta'], $coletor['id'], 1);

        if ($resultado) {
            $resposta = ['status' => 'success', 'mensagem' => 'Coleta aceita com sucesso!'];
        } else {
            $resposta = ['status' => 'error', 'mensagem' => 'Algum erro aconteceu :('];
        }

        echo json_encode($resposta);
    }
}

