<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../../config/Database.php');

include_once $databasePath;

$db = new Database();

class User
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getDadosUsuario($userId)
    {
        $sql = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
    public function updateDadosUsuario($userId, $nome , $email , $telefone , $cep , $endereco , $cidade , $estado , $numero)
    {
        $sql = "UPDATE usuario SET nome = :nome, email = :email, telefone = :telefone, endereco = :endereco, bairro = :bairro, cep = :cep, cidade = :cidade WHERE id = :id";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->execute();
        return true;
    }
    */

    public function updateDadosUsuario($userId, $nome = null, $email = null, $telefone = null, $cep = null, $endereco = null, $cidade = null, $estado = null, $numero = null, $bairro = null)

    {
        // Crie um array para armazenar os campos que serão atualizados
        $updates = array();

        // Verifique cada parâmetro e adicione os campos que não são nulos ao array de atualizações
        if ($nome !== null) {
            $updates[] = "nome = :nome";
        }
        if ($email !== null) {
            $updates[] = "email = :email";
        }
        if ($telefone !== null) {
            $updates[] = "telefone = :telefone";
        }
        if ($cep !== null) {
            $updates[] = "cep = :cep";
        }
        if ($endereco !== null) {
            $updates[] = "endereco = :endereco";
        }
        if ($cidade !== null) {
            $updates[] = "cidade = :cidade";
        }
        if ($estado !== null) {
            $updates[] = "estado = :estado";
        }
        if ($numero !== null) {
            $updates[] = "numero = :numero";
        }
        if ($bairro !== null) {
            $updates[] = "bairro = :bairro";
        }

        // Verifique se há campos para atualizar
        if (empty($updates)) {
            return false; // Nenhum campo para atualizar
        }

        // Construa a consulta SQL dinâmica
        $sql = "UPDATE usuario SET " . implode(', ', $updates) . " WHERE id = :id";

        // Prepare a consulta SQL
        $stmt = $this->db->getPdo()->prepare($sql);

        // Associe os parâmetros
        $stmt->bindParam(':id', $userId);
        if ($nome !== null) {
            $stmt->bindParam(':nome', $nome);
        }
        if ($email !== null) {
            $stmt->bindParam(':email', $email);
        }
        if ($telefone !== null) {
            $stmt->bindParam(':telefone', $telefone);
        }
        if ($cep !== null) {
            $stmt->bindParam(':cep', $cep);
        }
        if ($endereco !== null) {
            $stmt->bindParam(':endereco', $endereco);
        }
        if ($cidade !== null) {
            $stmt->bindParam(':cidade', $cidade);
        }
        if ($estado !== null) {
            $stmt->bindParam(':estado', $estado);
        }
        if ($numero !== null) {
            $stmt->bindParam(':numero', $numero);
        }
        if ($bairro !== null) {
            $stmt->bindParam(':bairro', $bairro);
        }

        // Execute a consulta SQL
        return $stmt->execute();
    }
}
