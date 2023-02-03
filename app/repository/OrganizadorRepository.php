<?php 

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/OrganizadorModel.php";
require_once __DIR__ . "./../repository/AdministradorRepository.php";

//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); colocar no models

class OrganizadorRepository{

    public PDO $conn;

    function __construct(){  

        $this->conn = Connection::getConnection();

    }

    public function create(OrganizadorModel $organizador): int {
        
        try{

            $query = "INSERT INTO organizador (nc_Organizador, email_Organizador, senha_Organizador) VALUES (:nome, :email, :senha)";

            $prepare = $this->conn->prepare($query);
            
            $prepare->bindValue(":nome", $organizador->getNome());
            
            $prepare->bindValue(":email", $organizador->getEmail());

            $prepare->bindValue(":senha", $organizador->getSenha());

            $prepare->execute();

            return $this->conn->lastInsertId();

        }catch (Exception $e){
            
            print("Erro ao inserir organizador no banco de dados!");

            }

        }

        public function findAll(): array {

            $table = $this->conn->query("SELECT * FROM organizador"); 

            $organizadores  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $organizadores;
        }
 
        public function findOrganizadorById(int $id) {

            $query = "SELECT * FROM organizador WHERE idOrganizador = ?"; //idOrganizador

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

            $query = "UPDATE organizador SET nc_Organizador = ?, email_Organizador = ?, senha_Organizador = ? WHERE idOrganizador = ?";

            $prepare = $this->conn->prepare($query);

            $prepare->bindValue(1, $organizador->getNome());

            $prepare->bindValue(2, $organizador->getEmail());

            $prepare->bindValue(3, $organizador->getSenha());

            $prepare->bindValue(4, $organizador->getId());

            $result = $prepare->execute();
        
            return $result;

        } 

         public function deleteById( int $id) : int {

            $query = "DELETE FROM organizador WHERE idOrganizador = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            //var_dump($result);
            return $result;

        }

        public function loginOfOrg( $email, $senha){

            try{

                $query = "SELECT idOrganizador, email_Organizador, senha_Organizador FROM organizador WHERE email_Organizador = :email AND senha_Organizador = :senha ";

                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":email", $email);

                $prepare->bindValue(":senha", $senha);

                $prepare->execute();
            
                $result = $prepare->fetch();

                if(!$result){

                  $msg =  print("Senha ou email incorretos");
                      
                   
                }else{

                    session_start();

                    $_SESSION['Logado'] = true;

                    $_SESSION['Org'] = $result['idOrganizador'];
                }

                return $result;

            }catch(Exception $e){


                $e = print ("Erro!"); // criar uma parametro caso o usuário não exista

            }
                $this->findAll($msg);
        

         }

  
        public function findOrgById():array {
            
            $query = "SELECT idOrganizador, nc_Organizador, email_Organizador, senha_Organizador FROM organizador WHERE idOrganizador = :id LIMIT 1";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(":id",  $_SESSION['Org'], PDO::PARAM_INT );
            $prepare->execute();
          
            if(($prepare) and ($prepare->rowCount() !=0)){
                $row = $prepare ->fetch(PDO::FETCH_ASSOC);
                
                // echo "id".$row["idOrganizador"]; 
                // echo "nome".$row["nc_Organizador"];
                // echo "email".$row["email_Organizador"];
                // echo "senha".$row["senha_Organizador"];    
        return $row;
        
            } 
                  
    }

    public function findEventoById():array{
            $query = "SELECT*FROM  cadastrar_evento WHERE idOrganizador = :id";
            $prepare = $this->conn->prepare($query);    
            $prepare->bindParam(":id", $_SESSION['Org'], PDO::PARAM_INT);
            $prepare->execute();
            return $prepare->fetchAll(PDO::FETCH_ASSOC);

            
            

    }
    

}      
?>