<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Evento</title>

    <!-- MOSTRAR O EVENTO POR ID -->

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

    <h1>Evento</h1>
    <ul>
        <?php
        foreach ($data['showEvent'] as $event) : ?>
            <?= $event['nome_evento']; ?>


        <?php endforeach;
        ?>

        // var_dump($data);
        ?>
        <? // $event['idCadastrar'] 
        ?>
        <br>
        <? //$event['nome_evento'] 
        ?>
        <br>
        <? //$event['data_evento'] 
        ?>
        <br>
        <? //$event['horaI_evento'] 
        ?>
        <br>
        <? // $event['horaF_evento'] 
        ?>
        <br>
        <? //$event['endereco_bairro'] 
        ?>
        <br>
        <? // $event['endereco_rua'] 
        ?>
        <br>
        <? // $event['endereco_num'] 
        ?>
        <br>
        <? //$event['cidade_evento'] 
        ?>
        <br>
        <? //$event['cep_evento'] 
        ?>
        <br>
        <? // $event['descricao_evento'] 
        ?>
        <br>
        <? // $event['ingresso'] 
        ?>
        <?php
        // if (//$event['ingresso'] == "") {
        //     echo // "Evento gratuíto";
        // } else {
        //     echo //$event['ingresso'];
        // }
        ?>
        <br>
        <img src="/bkmeventos/app/upload/<? //$event['imagem_evento'] 
                                            ?>">
        <br>

        </form>
        <!-- [<a href="./EventosController.php?action=edit&id=<? //$event['idCadastrar'] 
                                                                ?>">Editar</a>] -->
        <!-- [<a href="javascript: confirmarExclusãoEvento('<?= $event['nome_evento'] ?>', <?= $event['idCadastrar'] ?>)"> Excluir </a>] -->

        <?php
        // } 
        ?>
    </ul>
    <p>
        <!-- [ <a href="./EventosController.php?action=loadForm">Cadastrar novo</a> ] colocar no view principal -->

</html>