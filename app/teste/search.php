<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>Pesquisar evento</title>
</head>
<body> 

<?php
    // colocar isso no formato mvc
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //print_r ($data);

?>

<div class="container">

        <h1>Pesquisar Evento</h1>
        <form action="" method="POST">
         <!--label for="ide">Evento: </label-->
         <input type="text" name="nome_evento" id="ide" placeholder="Buscar Evento" value="<?php if(isset($data['nome_evento'])){ echo $data['nome_evento']; } ?>">
         <input type="submit" value="Pesquisar" name="pesqEvento" id="pesqEvento">
        </form>
  
      
    <?php 

    require_once __DIR__ . "/database.php";
    

    if(!empty($data['pesqEvento'])){
        $nome = "%".$data['nome_evento']."%";
        $query = ("SELECT * FROM cadastrar_evento WHERE nome_evento LIKE :nome ORDER BY nome_evento ASC");
        $prepare = $conn->prepare($query);
        $prepare->bindParam(':nome', $nome, PDO::PARAM_STR);
        $prepare->execute();
        while($rowCount = $prepare->fetch(PDO::FETCH_ASSOC)){
            //var_dump($rowCount);
            extract($rowCount);
            echo "nome evento: $nome_evento ";
        }
    }
     ?> 
</div>
</body>
</html>