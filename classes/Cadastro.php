<?php

class Cadastro
{
    private $conexao;

    public function __construct(Database $db)
    {
        $this->conexao = $db->getPdo();
    }

    public function cadastrarUsuario($nome, $email, $telefone, $senha)
    {
        try {
            do {
                // Gere um token único
                $token = bin2hex(random_bytes(16));

                // Verifique se o token já existe no banco de dados
                $sqlCheckToken = "SELECT COUNT(*) FROM usuario WHERE token = :token";
                $stmtCheckToken = $this->conexao->prepare($sqlCheckToken);
                $stmtCheckToken->bindParam(':token', $token);
                $stmtCheckToken->execute();
                $tokenExistente = $stmtCheckToken->fetchColumn();
            } while ($tokenExistente > 0); // Gere um novo token se o token já existir

            // Hash da senha antes de armazená-la no banco de dados (use um algoritmo seguro)
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Preparar a consulta SQL para inserir um novo usuário
            $sql = "INSERT INTO usuario (nome, email, senha, telefone, token) VALUES (:nome, :email, :senha, :telefone, :token)";
            $stmt = $this->conexao->prepare($sql);

            // Vincular os parâmetros da consulta
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->bindParam(':token', $token);

            // Executar a consulta
            $stmt->execute();
            
            // Inicie a sessão
            session_start();

            // Consulte o banco de dados para obter o ID do usuário recém-cadastrado
            $sqlGetUserId = "SELECT id, token FROM usuario WHERE email = :email";
            $stmtGetUserId = $this->conexao->prepare($sqlGetUserId);
            $stmtGetUserId->bindParam(':email', $email);
            $stmtGetUserId->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Armazene o ID do usuário na sessão
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_token'] = $usuario['token'];

            // Configure um cookie de autenticação (opcional)
            $cookieName = 'auth_token';
            $cookieValue = bin2hex(random_bytes(16)); // Gere um token aleatório
            $cookieExpire = time() + 3600; // Cookie expira em 1 hora
            setcookie($cookieName, $cookieValue, $cookieExpire, '/');

            return true;
        } catch (PDOException $e) {
            // Tratar erros de banco de dados aqui
            //return $e->getMessage();
            return false;
        }
    }

    public function redirecionar($url)
    {
        header("Location: $url");
        exit;
    }
}
