<?php

$dir = __DIR__;

$databasePath = realpath($dir . '/../../config/Database.php');

include_once $databasePath;

$db = new Database();

class Auth
{
    private $conexao;

    public function __construct(Database $db)
    {
        session_start();
        $this->conexao = $db->getPdo();
    }

    public function getUsuarioAutenticado()
    {
        // Verifique se o usuário está autenticado (usando a sessão)
        if (isset($_SESSION['user_id'])) {
            $usuario = [
                'id' => $_SESSION['user_id'],
                'nome' => $_SESSION['user_nome'],
                'email' => $_SESSION['user_email']
                // Adicione outros campos aqui, se necessário
            ];
            return $usuario;
        }
        return null;
    }

    public function autenticarPorToken($token)
    {
       
        // Consulte o banco de dados para obter informações do usuário com base no token
        $sql = "SELECT id, nome, email, token FROM usuario WHERE token = :token";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verifique se o token corresponde ao token na sessão (para evitar falsificação)
            if ($_SESSION['user_id'] === $usuario['token']) {
                // Configure a sessão com as informações do usuário
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_nome'] = $usuario['nome'];
                $_SESSION['user_email'] = $usuario['email'];
                $_SESSION['user_token'] = $usuario['token']; // Adicione o token à sessão
                return true; // Autenticação bem-sucedida
            }
        }

        return false; // Token inválido ou usuário não encontrado
    }


    public function verificarAutenticacao()
    {
        // Verifique se o usuário está autenticado (usando a sessão)
        return isset($_SESSION['user_id']);
    }

    public function encerrarSessao()
    {
        // Encerre a sessão
        session_destroy();
    }
}
