<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../../config/Database.php');

include_once $databasePath;

$db = new Database();

class Coleta {

	private $db;

	public function __construct(Database $db)
	{
		$this->db = $db;
	}

	public function listaColetas($cep)
	{
		$url = "https://viacep.com.br/ws/{$cep}/json/";

// Faça a solicitação à API e obtenha a resposta JSON
		$response = file_get_contents($url);

// Verifique se a solicitação foi bem-sucedida
		if ($response !== false) {
			$endereco = json_decode($response, true);

    // Extraia a cidade do resultado
			$cidade = $endereco['localidade'];

			$sql = "SELECT * FROM coletas WHERE cidade = :cidade AND situacao = :situacao";
			$stmt = $this->db->getPdo()->prepare($sql);
			$stmt->execute(array(
				':cidade' => $cidade,
				':situacao' => 0
			));
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} 

	}

	public function listaColeta($id)
	{
		$sql = "SELECT * FROM coletas WHERE id = :id";
		$stmt = $this->db->getPdo()->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		if($stmt->rowCount() == 0){
			die(header("Location: ../"));
		}
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function situacao($tipo)
	{

		$result = array(
			'txt' => '',
			'icon' => '',
			'color' => ''
		);

		switch ($tipo) {
			case 0:
			$result['txt'] = 'Aguardando aprovação';
			$result['icon'] = 'visibility';
			$result['color'] = 'yellow';
			break;
			case 1:
			$result['txt'] = 'Aprovado para coleta';
			$result['icon'] = 'check_circle_outline';
			$result['color'] = 'green';
			break;
			case 2:
			$result['txt'] = 'Recusado para coleta';
			$result['icon'] = 'highlight_off';
			$result['color'] = 'red';
			break;
			case 3:
			$result['txt'] = 'A caminho ao destino para a coleta';
			$result['icon'] = 'directions_run';
			$result['color'] = 'blue';
			break;
        case 4: // Corrigido de 3 para 4
        $result['txt'] = 'Coleta realizada';
        $result['icon'] = 'done_all';
        $result['color'] = 'green';
        break;
        default:
        $result['txt'] = null;
        break;
    }

    return $result;
}


public function tags($idColeta)
{
	$sql = "SELECT papel, plastico, metal, vidro, ferro, papelao, eletronicos FROM coletas WHERE id = :id";
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id', $idColeta);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}


public function recusarColeta($idColeta, $idColetor, $observacao, $situacao)
{
	//INSERINDO EMPRESA QUE IRÁ RECUSAR AS COLETAS
	$sql = "UPDATE coletas SET observacao = :observacao, situacao = :situacao, id_coletor = :id_coletor WHERE id = :id_coleta";
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id_coleta', $idColeta);
	$stmt->bindParam(':id_coletor', $idColetor);
	$stmt->bindParam(':observacao', $observacao);
	$stmt->bindParam(':situacao', $situacao);
	return $stmt->execute();
}


public function aceitarColeta($idColeta, $idColetor,$situacao)
{
	$sql = "UPDATE coletas SET situacao = :situacao, id_coletor = :id_coletor WHERE id = :id_coleta";
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id_coleta', $idColeta);
	$stmt->bindParam(':id_coletor', $idColetor);
	$stmt->bindParam(':situacao', $situacao);
	return $stmt->execute();
}	

public function finalizarColeta($idColeta, $idColetor, $observacao = null, $situacao)
{
	$sql = "UPDATE coletas SET situacao = :situacao, id_coletor = :id_coletor, observacao_coletor = :obs WHERE id = :id_coleta";
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id_coleta', $idColeta);
	$stmt->bindParam(':id_coletor', $idColetor);
	$stmt->bindParam(':situacao', $situacao);
	$stmt->bindParam(':obs', $observacao);
	return $stmt->execute();
}

public function listarUsuarioColeta($idUsuario)
{
	$sql = "SELECT * FROM usuario WHERE id = :id";
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id', $idUsuario);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}

public function coletasVisualizadas($idColetor)
{
	$sql = "SELECT * FROM coletas WHERE id_coletor = :id";
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id', $idColetor);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}


}