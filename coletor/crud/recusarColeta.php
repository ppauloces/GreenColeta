<?php

require_once '../config/auth.php';
require_once '../classes/Coleta.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['motivo_recusa']) || empty($_POST['id_coleta'])) {
    $resposta = ['status' => 'error', 'mensagem' => 'O campo de observação não pode ser vazio'];
    echo json_encode($resposta);
  } else {
    $resultado = $coletas->recusarColeta($_POST['id_coleta'], $coletor['id'], $_POST['motivo_recusa'], 2);

    if ($resultado) { // Verifica se a atualização foi bem-sucedida
      $resposta = ['status' => 'success', 'mensagem' => 'Observação adicionada!'];
    } else {
      $resposta = ['status' => 'error', 'mensagem' => 'Algum erro aconteceu :('];
    }

    echo json_encode($resposta);
  }
}
