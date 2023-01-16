<!DOCTYPE html>
<html lang="en">

<head>
    <title>cadastrar evento</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <script src="../views/helpers/excluirevento.js" type="text/javascript"></script>

</head>

<body>
    <?php

    include_once __DIR__ . "/../helpers/mensagem.php";

    ?>

    <h1>Eventos</h1>
    <ul>
        <?php foreach ($data['cadastrar_evento'] as $cd) : ?>
            <li>
                <?= $cd['idCadastrar'] ?> -
                <br>
                <?= $cd['nome_evento'] ?> -
                <br>
                <?= $cd['data_evento'] ?> -
                <br>
                <?= $cd['horaI_evento'] ?> -
                <br>
                <?= $cd['horaF_evento'] ?> -
                <br>
                <?= $cd['endereco_bairro'] ?> -
                <br>
                <?= $cd['endereco_rua'] ?> -
                <br>
                <?= $cd['endereco_num'] ?> -
                <br>
                <?= $cd['cidade_evento'] ?> -
                <br>
                <?= $cd['cep_evento'] ?> -
                <br>
                <?= $cd['descricao_evento'] ?> -
                <br>
                <img width="500px" src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>">
                <br>
                [<a href="./EventosController.php?action=edit&id=<?= $cd['idCadastrar'] ?>">Editar</a>]
                [<a href="javascript: confirmarExclusãoEvento('<?= $cd['nome_evento'] ?>', <?= $cd['idCadastrar'] ?>)"> Excluir </a>]
            </li>
        <?php endforeach; ?>
    </ul>
    <p>
        [ <a href="./EventosController.php?action=loadForm">Cadastrar novo</a> ] <!-- colocar no view principal -->
        <a href="./LadingController.php?action=loadForm">sair</a>

</html>