<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../../config/Database.php');

include_once $databasePath;
include_once 'Coletor.php';

$db = new Database();

class Auth
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function autenticarPorSessao()
    {
        // Inicie a sessão se ainda não estiver iniciada
        if (!isset($_SESSION)) {
            session_start();
        }

        // Verifique se o ID do usuário está na sessão
        if (isset($_SESSION['coletor_id'])) {
            // Consulte o banco de dados para obter informações do usuário, se necessário
            // Você pode adicionar a lógica aqui para carregar informações adicionais do usuário se desejar
            return true;
        } else {
            return false;
        }
    }

    public function getTokenColetor()
    {
        // Verifique se o ID do usuário está na sessão
        if (isset($_SESSION['coletor_id'])) {
            $coletorId = $_SESSION['coletor_id'];

            // Consulte o banco de dados para obter o nome do usuário com base no ID
            $sql = "SELECT token FROM coletor WHERE id = :id";
            $stmt = $this->db->getPdo()->prepare($sql);
            $stmt->bindParam(':id', $coletorId);
            $stmt->execute();
            $tokenUsuario = $stmt->fetchColumn();

            return $tokenUsuario;
        } else {
            return null; // Usuário não autenticado
        }
    }

    public function getDetalhesColetorLogado()
    {
        // Verifique se o ID do usuário está na sessão
        if (isset($_SESSION['coletor_id'])) {
            $coletorId = $_SESSION['coletor_id'];
            $coletor = new Coletor($this->db);
            return $coletor->getDadosColetor($coletorId);
        } else {
            return header('Location: http://localhost/greencoleta/login/'); // Usuário não autenticado
        }
    }

    public function destruirSessaoEcookie()
    {
        // Certifique-se de que a sessão esteja iniciada
        if (!isset($_SESSION)) {
            session_start();
        }

        // Destrua todas as variáveis de sessão
        session_unset();

        // Destrua a sessão
        session_destroy();

        header('Location: http://localhost/greencoleta/login/');

    }
}
