<?php 

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/OrganizadorModel.php";

class OrganizadorRepository{

    public PDO $conn;

    function __construct(){   // estudar esse connection / método

        $this->conn = Connection::getConnection();

    }

    public function create(OrganizadorModel $organizador): int {
        try{

            $query = "INSERT INTO organizadores (nc_Organizador, email_Organizador, senha_Organizador) VALUES (:nome, :email, :senha)";

            $prepare = $this->conn->prepare($query);
            
            $prepare->bindValue(":nome", $organizador->getNome());
            
            $prepare->bindValue(":email", $organizador->getEmail());

            $prepare->bindValue(":senha", $organizador->getSenha());

            $prepare->execute();

            return $this->conn->lastInsertId();

        }catch (Exception $e){
            
            print("Erro ao inserir organizador no banco de dados");

            }

        }

        public function findAll(): array {

            $table = $this->conn->query("SELECT * FROM organizadores"); 

            $organizadores  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $organizadores;
        }
 
        public function findOrganizadorById(int $id) {

            $query = "SELECT * FROM organizadores WHERE idOrganizador = ?"; //idOrganizador

            $prepare = $this->conn->prepare($query);

            $prepare->bindParam(1, $id, PDO::PARAM_INT);

            if($prepare->execute()){

                $organizador = $prepare->fetchObject("OrganizadorModel");

            } else {

                $organizador = null;

            }

            return $organizador;

        }

        public function update(OrganizadorModel $organizador) : bool {

            $query = "UPDATE organizadores SET nc_Organizador = ?, email_Organizador = ?, senha_Organizador = ? WHERE idOrganizador = ?";

            $prepare = $this->conn->prepare($query);

            $prepare->bindValue(1, $organizador->getNome());

            $prepare->bindValue(2, $organizador->getEmail());

            $prepare->bindValue(3, $organizador->getSenha());

            $prepare->bindValue(4, $organizador->getId());

            $result = $prepare->execute();
        
            return $result;

        } 

         public function deleteById( int $id) : int {

            $query = "DELETE FROM organizadores WHERE idOrganizador = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;

        }



        public function loginOfOrg(OrganizadorModel $organizador){

            /*this->nome = $organizador['nome'];
            this->senha = $organizador['senha'];*/

            try{

                $query = "SELECT idOrganziador, nc_Organizador, senha_Organizador FROM organizadores WHERE nc_Organizador = :nome AND senha_Organizador = :senha ";

                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":nome", $organizador->getNome());

                $prepare->bindValue(":senha", $organizador->getSenha());

                $prepare->execute();

                if($prepare->rowCount() == 0){

                    header("Location: login/login.php");

                }else{

                    session_start();

                    $result  = $prepare->fetch();

                    $_SESSION['Logado'] = "Login realizado com sucesso!";

                    $_SESSION['Org'] = $result['ididOrganziador'];

                    header ("Location: organizadores/PaginaOrganizador.php ");
                }

                return $result;

            }catch(Exception $e){


                print("Erro, dados não convem com o banco de dados!");

            }

        }


    



    
}
?>