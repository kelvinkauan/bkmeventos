<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar teste</title>
</head>
<body>

<h1>Pesquisar Evento</h1>
        <form action="./EventosController.php?action=search" method="POST">
         <!--label for="ide">Evento: </label-->
         <input type="text" name="nome_evento" id="ide" placeholder="Buscar Evento" value="<?php if(isset($data['nome_evento'])){ echo $data['nome_evento']; } ?>">
         <input type="submit" value="Pesquisar" name="pesqEvento" id="pesqEvento">
        </form>
</body>
</html>