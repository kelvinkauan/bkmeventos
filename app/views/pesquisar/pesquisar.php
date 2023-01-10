<!DOCTYPE html>

<html lang="en">

<head>
    <title>
        Pesquisa de eventos
    </title>
</head>

<body>
    <h3>Pesquisar evento</h3>
    <form action="" method="GET">
        <input type="text" name="buscar" placeholder="Buscar Evento">
        <input type="submit" value="search" name="action" id="pesqEvento">
    </form>

    <?php

    if (isset($data['resultado'])) {
        foreach ($data['resultado']  as $res) :
            echo $res['nome_evento'];
        endforeach;
    }
    ?>



</body>

</html>