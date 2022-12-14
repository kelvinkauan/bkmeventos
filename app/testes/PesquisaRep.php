<?php


require_once __DIR__ . "./../connection/connection.php";


class pesquisarRepository{

    public PDO $conn;
    function __construct(){   
        $this->conn = Connection::getConnection();
    }

    public function pesquisar(string $pesquisa){

        $pesquisa = "%".$_GET['buscar']."%";
        $query = "SELECT * FROM cadastrar_evento WHERE nome_evento LIKE :nome";
        $prepare = $this->conn->prepare($query);
        $prepare->bindValue(':nome', $pesquisa, PDO::PARAM_STR);
       // $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);

    }
}