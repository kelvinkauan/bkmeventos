<?php

use LDAP\Result;

require_once __DIR__ . "./../connection/connection.php";


class PesquisarRepository {

    public PDO $conn;
    function __construct(){   
        $this->conn = Connection::getConnection();
    

    }

    public function search(string $pesquisa){

        $pesquisa = '%$pesquisa%';
        $query = "SELECT * FROM cadastrar_evento WHERE nome_evento LIKE :nome";
        $prepare = $this->conn->prepare($query);
        $prepare->bindParam(':nome', $pesquisa, PDO::PARAM_STR);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
        }

    }

?>