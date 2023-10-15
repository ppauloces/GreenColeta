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

	
	public function novaColeta($id_user, $papel, $plastico, $metal, $vidro, $ferro, $papelao, $eletronicos, $imagem, $cep, $rua, $cidade, $bairro, $estado, $numero, $ponto_referencia, $situacao, $token)
	{
		$sql = "INSERT INTO coletas (id_user, papel, plastico, metal, vidro, ferro, papelao, eletronicos, imagem, cep, rua, cidade, bairro, estado, numero, ponto_referencia, situacao, token) VALUES (:id_user, :papel, :plastico, :metal, :vidro, :ferro, :papelao, :eletronicos, :imagem, :cep, :rua, :cidade, :bairro, :estado, :numero, :ponto_referencia, :situacao, :token)";

		$stmt = $this->db->getPdo()->prepare($sql);
		$stmt->bindParam(':id_user', $id_user);
		$stmt->bindParam(':papel', $papel);
		$stmt->bindParam(':plastico', $plastico);
		$stmt->bindParam(':metal', $metal);
		$stmt->bindParam(':vidro', $vidro);
		$stmt->bindParam(':ferro', $ferro);
		$stmt->bindParam(':papelao', $papelao);
		$stmt->bindParam(':eletronicos', $eletronicos);
		$stmt->bindParam(':imagem', $imagem);
		$stmt->bindParam(':cep', $cep);
		$stmt->bindParam(':rua', $rua);
		$stmt->bindParam(':cidade', $cidade);
		$stmt->bindParam(':bairro', $bairro);
		$stmt->bindParam(':estado', $estado);
		$stmt->bindParam(':numero', $numero);
		$stmt->bindParam(':ponto_referencia', $ponto_referencia);
		$stmt->bindParam(':situacao', $situacao);
		$stmt->bindParam(':token', $token);
		return $stmt->execute();
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

public function coletasRecentes($id_user)
{
	$sql = "SELECT * FROM coletas WHERE id_user = :id ORDER BY data DESC LIMIT 3";
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id', $id_user);
	$stmt->execute();
	$fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $fetch;
}

public function deletarColeta($idColeta)
{
	$sql = 'DELETE FROM coletas WHERE id = :id';
	$stmt = $this->db->getPdo()->prepare($sql);
	$stmt->bindParam(':id', $idColeta);
	if($stmt->execute()){
		return 'success';
	}else{
		return 'error';
	}
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

}