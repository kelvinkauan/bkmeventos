<?php


require_once __DIR__ . "../connection/connection.php";
require_once __DIR__ . "../models/AdmModel.php";

class AdmrRepository{

    public PDO $conn;

    function __construct(){  

        $this->conn = Connection::getConnection();

    }


    public function create (AdmModel $administrador): int {

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




    }

}

?>