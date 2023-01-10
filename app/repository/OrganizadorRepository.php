<?php

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/OrganizadorModel.php";



//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); colocar no models

class OrganizadorRepository
{

    public PDO $conn;

    function __construct()
    {

        $this->conn = Connection::getConnection();
    }

    public function create(OrganizadorModel $organizador): int
    {

        try {
            $query = "INSERT INTO organizador (nc_Organizador, email_Organizador, senha_Organizador) VALUES (:nome, :email, :senha)";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":nome", $organizador->getNome());
            $prepare->bindValue(":email", $organizador->getEmail());
            $prepare->bindValue(":senha", $organizador->getSenha());
            $prepare->execute();
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            print("Erro ao inserir organizador no banco de dados!");
        }
    }

    public function findAll(): array
    {

        $table = $this->conn->query("SELECT * FROM organizador");
        $organizador  = $table->fetchAll(PDO::FETCH_ASSOC);
        return $organizador;
    }

    public function findOrganizadorById(int $id)
    {

        $query = "SELECT * FROM organizador WHERE idOrganizador = ?"; //idOrganizador
        $prepare = $this->conn->prepare($query);
        $prepare->bindParam(1, $id, PDO::PARAM_INT);
        if ($prepare->execute()) {
            $organizador = $prepare->fetchObject("OrganizadorModel");
        } else {
            $organizador = null;
        }
        return $organizador;
    }

    public function update(OrganizadorModel $organizador): bool
    {

        $query = "UPDATE organizador SET nc_Organizador = ?, email_Organizador = ?, senha_Organizador = ? WHERE idOrganizador = ?";
        $prepare = $this->conn->prepare($query);
        $prepare->bindValue(1, $organizador->getNome());
        $prepare->bindValue(2, $organizador->getEmail());
        $prepare->bindValue(3, $organizador->getSenha());
        $prepare->bindValue(4, $organizador->getId());
        $result = $prepare->execute();
        return $result;
    }

    public function deleteById(int $id): int
    {

        $query = "DELETE FROM organizador WHERE idOrganizador = :id";
        $prepare = $this->conn->prepare($query);
        $prepare->bindValue(":id", $id);
        $prepare->execute();
        $result = $prepare->rowCount();
        return $result;
    }

    public function loginOfOrg($email, $senha)
    {

        try {
            $query = "SELECT idOrganizador, email_Organizador, senha_Organizador FROM organizador WHERE email_Organizador = :email AND senha_Organizador = :senha ";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":email", $email);
            $prepare->bindValue(":senha", $senha);
            $prepare->execute();
            $result = $prepare->fetch();
            if (!$result) {
                $msg =  print("Senha ou email incorretos");
            } else {
                session_start();
                $_SESSION['Logado'] = true;
                $_SESSION['Org'] = $result['idOrganizador'];
            }
            return $result;
        } catch (Exception $e) {
            $e = print("Erro! Usuario não cadastrado!"); // criar uma parametro caso o usuário não exista
        }
        $this->findAll($msg);
    }
}
