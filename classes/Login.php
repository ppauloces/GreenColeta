<?php

class Login
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function validar($email, $senha)
    {
        // Consulte o banco de dados para verificar se o email existe
        $sql = "SELECT id, senha FROM usuario WHERE email = :email";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            $dadosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dadosUsuario) {
                // Verifique se a senha corresponde à senha armazenada no banco de dados
                if (password_verify($senha, $dadosUsuario['senha'])) {
                    // Credenciais válidas, retorne o ID do usuário
                    return $dadosUsuario['id'];
                }
            }
        }

        // Credenciais inválidas, retorne falso
        return false;
    }
}
