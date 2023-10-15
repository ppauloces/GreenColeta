<?php

require_once '../config/auth.php';
require_once '../classes/Upload.php';
require_once '../classes/Coleta.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tiposDisponiveis = array(
        "papel" => "N",
        "plastico" => "N",
        "metal" => "N",
        "vidro" => "N",
        "ferro" => "N",
        "papelao" => "N",
        "eletronicos" => "N"
    );

    $coleta = new Coleta($db);

    // Verifica se a chave "enderecoAtual" existe no array POST
    if ($_POST['enderecoAtual'] == 'true') {
        // Se "enderecoAtual" não estiver definido ou for 'true', use os valores do usuário
        $cep = $user['cep'] ?? null;
        $rua = $user['endereco'] ?? null;
        $cidade = $user['cidade'] ?? null;
        $bairro = $user['bairro'] ?? null;
        $estado = $user['estado'] ?? null;
        $numero = $user['numero'] ?? null;
        $ponto_referencia = "Perto dali";
    } else {

        $cep = $_POST['cep'] ?? null;
        $rua = $_POST['endereco'] ?? null;
        $cidade = $_POST['cidade'] ?? null;
        $bairro = $_POST['bairro'] ?? null;
        $estado = $_POST['estado'] ?? null;
        $numero = $_POST['numero'] ?? null;
        $ponto_referencia = "Perto dali";
    }

    if (empty($cep) || empty($rua) || empty($cidade) || empty($bairro) || empty($estado) || empty($numero)) {
        $resposta = ['status' => 'error', 'mensagem' => 'Preencha todos os campos'];
    } else {

        $imagem = $_FILES['imagemColeta'];
        $targetDirectory = URL_IMAGENS_UPLOAD;
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 10485760;

        $upload = new Upload($_FILES['imagemColeta'], 1000, 800, $targetDirectory);
        $resultado = $upload->salvar();
        $nomeImagem = $upload->getNomeImagem();

        if ($resultado == 'arquivo_nao_permitido') {
            $resposta = ['status' => 'error', 'mensagem' => 'Tipo de arquivo não permitido. Apenas arquivos de imagem.'];
        } elseif ($resultado == 'tamanho_excedido') {
            $resposta = ['status' => 'error', 'mensagem' => 'O arquivo enviado é muito grande'];
        } elseif ($resultado == 'enviado') {
            // Verifica se o tipo foi selecionado e define "S" se foi
            foreach ($tiposDisponiveis as $tipo => $selecionado) {
                if (isset($_POST['tipo']) && in_array($tipo, $_POST['tipo'])) {
                    $tiposDisponiveis[$tipo] = "S";
                }
            }

            // Atribui os valores a variáveis individuais
            $papel = $tiposDisponiveis['papel'];
            $plastico = $tiposDisponiveis['plastico'];
            $metal = $tiposDisponiveis['metal'];
            $vidro = $tiposDisponiveis['vidro'];
            $ferro = $tiposDisponiveis['ferro'];
            $papelao = $tiposDisponiveis['papelao'];
            $eletronicos = $tiposDisponiveis['eletronicos'];

            $situacao = 0;

            $token = md5(uniqid(rand(), true));

            $coleta->novaColeta($user['id'], $papel, $plastico, $metal, $vidro, $ferro, $papelao, $eletronicos, $nomeImagem, $cep, $rua, $cidade, $bairro, $estado, $numero, $ponto_referencia, $situacao,$token);

            $resposta = ['status' => 'success', 'mensagem' => 'Coleta cadastrada com sucesso!'];
        } else {
            $resposta = ['status' => 'error', 'mensagem' => 'Erro desconhecido, tente novamente.'];
        }
    }

    echo json_encode($resposta);
}