<?php 

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/EventosModels.php";

class EventosRepostiry {

    public PDO $conn;

    function __construct(){   // estudar esse connection / método

        $this->conn = Connection::getConnection();

    }

    public function create(OrganizadorModel $evento){

        try {
              
            $query = "INSERT INTO  ";

            $prepare = $this->conn->prepare($query);

        } catch (\Throwable $th) {
            //throw $th;
        }


        


    }

}
