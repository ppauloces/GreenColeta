<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../../config/Database.php');

include_once $databasePath;

$db = new Database();

class Coletor
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getDadosColetor($coletorId)
    {
        $sql = "SELECT * FROM coletor WHERE id = :id";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(':id', $coletorId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    

    }
