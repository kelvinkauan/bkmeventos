<!DOCTYPE html>
<html lang="en">
<head>
    <title>cadastrar evento</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="stylesheet" type="text/css" href="../views/helpers/estilos.css">
    <script src="../views/helpers/funcoescrud.js" type="text/javascript"></script>

</head>
<body>
<?php
	include_once __DIR__ . "/../helpers/mensagem.php";

?>

    <h1>Eventos</h1>
    <ul>
        <?php foreach($data['cadastrar_evento'] as $cd): ?>
            
            <li>
                <?= $cd['idCadastrar'] ?> -
                <?= $cd['nome_evento'] ?> -
                <?= $cd['data_evento'] ?> -
                <?= $cd['horaI_evento'] ?> -
                <?= $cd['horaF_evento'] ?> -
                <?= $cd['endereco_bairro'] ?> -
                <?= $cd['endereco_rua'] ?> -
                <?= $cd['endereco_num'] ?> -
                <?= $cd['cidade_evento'] ?> -
                <?= $cd['CEP_evento'] ?> -
                <?= $cd['descricao_evento'] ?> -
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
    [ <a href="./EventosController.php?action=loadForm">Cadastrar novo</a> ]  <!-- colocar no view principal -->
</html>