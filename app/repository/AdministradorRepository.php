<?php

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/AdministradorModel.php";

class AdministradorRepository{

    public PDO $conn;
    function __construct(){  
        $this->conn = Connection::getConnection();

    }

    public function create (AdministradorModel $administrador): int {

        try {
            $query = "INSERT INTO administradores (nome_Adm, senha_Adm) Values (:nome, :senha)";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":nome", $administrador->getNome());
            $prepare->bindValue(":senha", $administrador->getSenha());
            $prepare->execute();
            return $this->conn->lastInsertId();
        } catch (Exception $e) {

            print("Erro ao inserir administrador no banco de dados!");
            
        }     
    }

    public function findAll(): array {

        $table = $this->conn->query("SELECT * FROM administradores"); 
        $administrador = $table->fetchAll(PDO::FETCH_ASSOC);
        return $administrador;

    }

    public function update(AdministradorModel $administrador): bool{

            $query = "UPDATE administradores SET nome_Adm = ?, senha_Adm = ? WHERE idAdministrador = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $administrador->getNome());
            $prepare->bindValue(2, $administrador->getSenha());
            $prepare->bindValue(3, $administrador->getId());
            $result = $prepare->execute();
            return $result;
    }

    public function deleteById(int $id): int {

           $query = "DELETE FROM administradores WHERE idAdministrador = :id";
           $prepare = $this->conn->prepare($query);
           $prepare->bindValue(":id", $id);
           $prepare->execute();
           $result = $prepare->rowCount();
           return $result;
    }
        
    public function findAdministradorById(int $id) {

           $query = "SELECT * FROM administradores WHERE  idAdministrador = ?"; 
           $prepare = $this->conn->prepare($query);
           $prepare->bindParam(1, $id, PDO::PARAM_INT);
           if($prepare->execute()){
             $administrador = $prepare->fetchObject("AdministradorModel");
           } else {
             $administrador = null;
          }
          return $administrador;

    }

    public function loginOfAdministrador(AdministradorModel $administrador) :bool{

        try {
          $query = "SELECT idAdministrador, nome_Adm, senha_Adm FROM administradores WHERE nome_Adm = :nome  AND senha_Adm = :senha";
          $prepare = $this->conn->prepare($query);
          $prepare->bindValue(":nome", $administrador->getNome());
          $prepare->bindParam(":senha", $administrador->getSenha());
          $prepare->execute();
        } catch (Exception $e) {

            $e = "Erro! Senha ou nome incorretos";

        }
          if($result = true){
          session_start();
          $_SESSION['Logado'] = true;
          $_SESSION['adm'] = $result['idAdministrador'];
          }if(!$result){
          print_r($e);
          }
         return $result; // matheus login 
    }
         

        }

?>