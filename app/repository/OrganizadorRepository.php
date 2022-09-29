<?php 

session_start();
ob_start();
require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/OrganizadorModel.php";

//$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); colocar no models

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

        public function loginByid(OrganizadorModel $organizador){

            if(!empty($organizador['entrar'])){   

           //  var_dump($organizador);

              $query =  "SELECT idOrganziador , nc_Organizador, email_Organizador, senha_Organizador FROM organizadores WHERE email_Organizador = :email LIMIT 1 "; //'".$organizador['email']."' 

              $prepare = $this->conn->prepare($query);

              $prepare->bindParam(':email', $organizador->getEmail());

              $prepare->execute();

              if(($prepare) AND ($prepare->rowCount() != 0 )){

                $row = $prepare->fetch(PDO::FETCH_ASSOC);

               // var_dump($row);

                if(password_verify($organizador['senha_Organizador'], $row['senha_Organizador'])){

                    $_SESSION ['id'] =  $row['idOrganizador'];

                    $_SESSION ['nome'] =  $row['nc_Organizador'];

                    header("location: /organizadores/PaginaOrganizador.php");
                   // echo "Login bem sucessedido";

                }else{

                    $_SESSION ['msg'] = "Usuário ou senha inválida!";
                }

              }else{

                $_SESSION ['msg'] = "Usúario ou senha inválida!";

              }

             
            }
             if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
             }

           /* try{

                $query = "SELECT idOrganziador , nc_Organizador, senha_Organizador FROM organizadores WHERE nc_Organizador = :nome AND  senha_Organizador = :senha ";

                $prepare = $this->conn->prepare($query);

                $prepare->bindValue(":nome", $organizador->getNome());

                $prepare->bindValue(":senha", $organizador->getSenha());


            }catch(Exception $e){

                print("Login não encontrado no banco de dados");

            }
*/
        }


    
}
?>