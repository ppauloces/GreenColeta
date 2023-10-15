<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../../config/Database.php');

include_once $databasePath;
include_once 'User.php';

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
        if (isset($_SESSION['user_id'])) {
            // Consulte o banco de dados para obter informações do usuário, se necessário
            // Você pode adicionar a lógica aqui para carregar informações adicionais do usuário se desejar
            return true;
        } else {
            return false;
        }
    }


    public function getNomeUsuario()
    {
        // Verifique se o ID do usuário está na sessão
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];

            // Consulte o banco de dados para obter o nome do usuário com base no ID
            $sql = "SELECT nome FROM usuario WHERE id = :id";
            $stmt = $this->db->getPdo()->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $nomeUsuario = $stmt->fetchColumn();

            return $nomeUsuario;
        } else {
            return null; // Usuário não autenticado
        }
    }

    public function getTokenUsuario()
    {
        // Verifique se o ID do usuário está na sessão
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];

            // Consulte o banco de dados para obter o nome do usuário com base no ID
            $sql = "SELECT token FROM usuario WHERE id = :id";
            $stmt = $this->db->getPdo()->prepare($sql);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            $tokenUsuario = $stmt->fetchColumn();

            return $tokenUsuario;
        } else {
            return null; // Usuário não autenticado
        }
    }

    public function getDetalhesUsuarioLogado()
    {
        // Verifique se o ID do usuário está na sessão
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $user = new User($this->db);
            return $user->getDadosUsuario($userId);
        } else {
            return null; // Usuário não autenticado
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

        // Destrua o cookie de autenticação, se existir
        if (isset($_COOKIE['auth_token'])) {
            $cookieName = 'auth_token';
            setcookie($cookieName, '', time() - 3600, '/');
        }
        header('Location: http://localhost/greencoleta/login/');
    }
}
