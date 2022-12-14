<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search bar</title>
</head>
<body>

<?php

	include_once __DIR__ . "/../helpers/mensagem.php";

?>

<h1>Resultado da pesquisa</h1>
<br>

<div class="container">
    <form action="pesquisa.php" method="GET"> <!-- ./PesquisarCon.php?action=search -->
      <input type="text" name="buscar" placeholder="Searching for events..">
      <button type="submit">Pesquisar</button>

    </form>
</div>
<br>
  <ul>

<?php foreach($Resultado['pesquisa'] as $res): ?>
  <li>
   
      <?= $res['nome_evento'] ?> -
    
  </li>
<?php endforeach; ?>

      /*if(count($Resultado)){
                foreach($Resultado['pesquisa'] as $pes){
       
                    $pes['nome_evento']; 
                    
                } 
             }else{
                   
                   echo "Nenhum evento foi encontrado";
       
            }*/
            ?>
  </ul>
</body>
</html>