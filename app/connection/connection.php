<?php

class Connection {
   // private static $imagem = $_FILES['foto_evento'];
    private static $host = "localhost";
    private static $dbname = "projeto_integrador";
    private static $user = "root";
    private static $password = "";

    private static ?PDO $conn = null;

    public static function getConnection(): PDO {

        if(self::$conn == null) {

            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              // print("Successfully connected to the data base: " . self::$dbname);

            } catch(Exception $e) {
                print("Erro ao conectar com o banco de dados" . $e->getMessage());
            }

        }

        return self::$conn;
    }



}


?>