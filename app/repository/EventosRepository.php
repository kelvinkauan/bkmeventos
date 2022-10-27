<?php 

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/EventosModels.php";

class Repostiry {

    public PDO $conn;

    function __construct(){   // estudar esse connection / método

        $this->conn = Connection::getConnection();

    }

    public function create(OrganizadorModel $evento){

        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }


        


    }

}
