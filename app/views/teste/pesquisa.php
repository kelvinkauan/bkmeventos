<?php

require_once __DIR__ . "./../../connection/connection.php"; 


$pesquisa = "%".$_GET['buscar']."%";
$query = "SELECT * FROM cadastrar_evento WHERE nome_evento LIKE :nome";
$prepare = $this->conn->prepare($query);
$prepare->bindValue(':nome', $pesquisa, PDO::PARAM_STR);
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);
if(count($Resultado)){
    foreach($Resultado['pesquisa'] as $pes){

        $pes['nome_evento']; 
        
    } 
 }else{
       
       echo "Nenhum evento foi encontrado";

}



?> 