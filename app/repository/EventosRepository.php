<?php 

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/EventosModel.php";

class EventosRepository {

    public PDO $conn;
    function __construct(){   
        $this->conn = Connection::getConnection();
    }

    public function create(EventosModel $evento): int {

        try {
              
            $query = "INSERT INTO cadastrar_evento (nome_evento, data_evento, horaI_evento, horaF_evento, endereco_bairro, endereco_rua, endereco_num, cidade_evento, CEP_evento, descricao_evento, foto_evento) VALUES (:nome,:dia, :inicio, :final, :bairro, :rua, :numero, :cidade, :cep, :descricao, :foto) ";
            $prepare =$this->conn->prepare($query);
            $prepare->bindValue(":nome", $evento->getNome());
            $prepare->bindValue(":dia", $evento->getData());
            $prepare->bindValue(":inicio", $evento->getHorarioI());
            $prepare->bindValue(":final", $evento->getHorarioF());
            $prepare->bindValue(":bairro", $evento->getBairro());
            $prepare->bindValue(":rua", $evento->getNomeRua());
            $prepare->bindValue(":numero", $evento->getNumRua());
            $prepare->bindValue(":cidade", $evento->getCidade());
            $prepare->bindValue(":cep", $evento->getCEP());
            $prepare->bindValue(":descricao", $evento->getDescricao());
            $prepare->bindValue(":foto,", $evento-> getImagem());
            $prepare -> execute();   
            return $this->conn->lastInsertId();

        } catch (Exception $e) {

            print("Erro ao inserir os dados do evento no banco de dados!");

        }
        
       }

        public function findAll(): array {   

            $table = $this->conn->query("SELECT * FROM cadastrar_evento"); 
            $evento = $table->fetchAll(PDO::FETCH_ASSOC);
            return $evento;

        }
 
        public function findEventoById(int $id) {

            $query = "SELECT * FROM cadastrar_evento WHERE idCadastrar = ?"; 
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $id, PDO::PARAM_INT);
            if($prepare->execute()){
                $evento = $prepare->fetchObject("EventosModel");
            } else {
                $evento = null;
            }
            return $evento;

        }

        public function update(EventosModel $evento) : bool {

            $query = "UPDATE cadastrar_evento SET data_evento = ?, horaI_evento = ?, horaF_evento = ?, endereco_bairro = ?, endereco_rua = ?, endereco_num = ?, cidade_evento = ?, cep_evento = ?, descricao_evento = ? WHERE idCadastrar = ?";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(1, $evento->getData());
            $prepare->bindValue(2, $evento->getHorarioI());
            $prepare->bindValue(3, $evento->getHorarioF());
            $prepare->bindValue(4, $evento->getBairro());
            $prepare->bindValue(5, $evento->getNomeRua());
            $prepare->bindValue(6, $evento->getNumRua());
            $prepare->bindValue(7, $evento->getCidade());
            $prepare->bindValue(8, $evento->getCEP());
            $prepare->bindValue(9, $evento->getDescricao());
            $prepare->bindValue(10, $evento->getId());
            $result = $prepare->execute();
            return $result;

        } 

        public function deleteById(int $id) : int {

            $query = "DELETE FROM cadastrar_evento WHERE idCadastrar = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            $result = $prepare->rowCount();
            return $result;

        }

        public function searchByStr(string $pesquisa){
                
            $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $nome = "%".$data['nome_evento']."%";
            $query = ("SELECT * FROM cadastrar_evento WHERE nome_evento LIKE :nome ORDER BY nome_evento ASC");
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(':nome', $nome, PDO::PARAM_STR);
            $prepare->execute();
            while($rowCount = $prepare->fetch(PDO::FETCH_ASSOC)){
                //var_dump($rowCount);
                extract($rowCount);
            }

           /*$query = "SELECT * FROM cadastrar_evento WHERE nome_evento LIKE '$:nome$' ORDER BY nome_evento ASC ";
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(':nome', $pesquisa, PDO::PARAM_STR);
           // $prepare->execute();
            if($prepare->execute()){
            while($rowCount = $prepare->fetch(PDO::FETCH_ASSOC)){
                var_dump($rowCount);
                extract($rowCount); 
                echo "nome evento: $nome_evento ";
             }
            }
            return $rowCount;¨*/

           }
}