<?php

    if(!isset($_GET['buscar'])){
       header("Location: search.php");
       echo "Evento não cadastrado";
       exit;
    } else{

        $search = "%".$_GET['buscar']."%";
    }



?> 