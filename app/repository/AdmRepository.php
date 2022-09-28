<?php 

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/AdmModel.php";

class AdmRepository{

    public PDO $conn;

    function __construct(){   // estudar esse connection / método

        $this->conn = Connection::getConnection();

    }

    public function create(AdmModel $administrador): int {
        try{

            $query = "INSERT INTO organizadores (nc_Organizador, email_Organizador, senha_Organizador) VALUES (:nome, :email, :senha)";

            $prepare = $this->conn->prepare($query);
            
            $prepare->bindValue(":nome", $administrador->getNome());
            
            $prepare->bindValue(":senha", $administrador->getSenha());

            $prepare->execute();

            return $this->conn->lastInsertId();

        }catch (Exception $e){
            
            print("Erro ao inserir organizador no banco de dados");

            }

        }

        public function findAll(): array {

            $table = $this->conn->query("SELECT * FROM administradores"); 

            $administrador  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $administrador;
        }
 
        public function findAdminById(int $id) {

            $query = "SELECT * FROM administradores WHERE idAdministrador = ?"; //idAdministrador

            $prepare = $this->conn->prepare($query);

            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){

                $administrador = $prepare->fetchObject("AdmModel");

            } else {

                $administrador = null;

            }

            return $administrador;

        }

    
}
?>