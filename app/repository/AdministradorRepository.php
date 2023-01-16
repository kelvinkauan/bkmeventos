<?php

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/AdministradorModel.php";
require_once __DIR__ . "./../models/OrganizadorModel.php";

class AdministradorRepository
{

    public PDO $conn;
    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function create(AdministradorModel $administrador): int
    {

        try {
            $query = "INSERT INTO administrador (nome_Adm, senha_Adm, email_Adm) Values (:nome, :senha, :email)";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":nome", $administrador->getNome());
            $prepare->bindValue(":senha", $administrador->getSenha());
            $prepare->bindValue(":email", $administrador->getEmail());
            $prepare->execute();
            return $this->conn->lastInsertId();
        } catch (Exception $e) {

            print("Erro ao inserir administrador no banco de dados!");
        }
    }

    public function findAll(): array
    {

        $table = $this->conn->query("SELECT * FROM administrador");
        $administrador = $table->fetchAll(PDO::FETCH_ASSOC);
        return $administrador;
    }

    public function update(AdministradorModel $administrador): bool
    {

        $query = "UPDATE administrador SET nome_Adm = ?, senha_Adm = ?, email_Adm = ? WHERE idAdministrador = ?";
        $prepare = $this->conn->prepare($query);
        $prepare->bindValue(1, $administrador->getNome());
        $prepare->bindValue(2, $administrador->getSenha());
        $prepare->bindValue(3, $administrador->getEmail());
        $prepare->bindValue(4, $administrador->getId());
        $result = $prepare->execute();
        return $result;
    }

    public function deleteById(int $id): int
    {

        $query = "DELETE FROM administrador WHERE idAdministrador = :id";
        $prepare = $this->conn->prepare($query);
        $prepare->bindValue(":id", $id);
        $prepare->execute();
        $result = $prepare->rowCount();
        return $result;
    }

    public function findAdministradorById(int $id)
    {

        $query = "SELECT * FROM administrador WHERE idAdministrador = ?";
        $prepare = $this->conn->prepare($query);
        $prepare->bindParam(1, $id, PDO::PARAM_INT);
        if ($prepare->execute()) {
            $administrador = $prepare->fetchObject("AdministradorModel");
        } else {
            $administrador = null;
        }
        return $administrador;
    }

    public function loginOfAdm($email, $senha)
    {

        try {
            $query = "SELECT idAdministrador, nome_Adm, email_Adm, senha_Adm FROM administrador WHERE email_Adm = :email  AND senha_Adm = :senha";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":email", $email);
            $prepare->bindValue(":senha", $senha);
            $prepare->execute();
            $result = $prepare->fetch();
            if (!$result) {
            } else {
                session_start();
                $_SESSION['Logado'] = true;
                $_SESSION['Adm'] = $result['idAdministrador'];
            }
            return $result;
        } catch (Exception $e) {
            $e = "Erro! Senha ou nome incorretos";
        }
    }

    public function findOrg(): array
    {

        $table = $this->conn->query("SELECT * FROM organizador");
        $organizador = $table->fetchAll(PDO::FETCH_ASSOC);
        return $organizador;
    }

    public function findEvents(): array
    {

        $table = $this->conn->query("SELECT * FROM cadastrar_evento");
        $evento = $table->fetchAll(PDO::FETCH_ASSOC);
        return $evento;
    }
}
