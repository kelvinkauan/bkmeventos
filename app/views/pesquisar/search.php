<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar teste</title>
</head>
<body>

<?php 

include_once __DIR__ . "/../helpers/mensagem.php";

?>

<h1>Pesquisar Evento</h1>

    
        <form action="./EventosController.php?action=search" method="GET">
         <input type="text" name="buscar" placeholder="Buscar Evento">
         <input type="submit" value="Pesquisar" id="pesqEvento">
        </form>

        <?php foreach($Resultado['buscas'] as $res): ?>
            <?= $res['nome_evento'] ?>
        <?php endforeach; ?>

</body>
</html>