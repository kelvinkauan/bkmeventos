<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Evento</title>

    <!-- MOSTRAR O EVENTO POR ID -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../views/stylePaginaOrganizador/styles/fonts.css">
    <link rel="stylesheet" href="../views/eventos/style/CardEvent.css">
    <!-- <script src="../views/helpers/excluirevento.js" type="text/javascript"></script> -->

</head>

<body>
    <header>
        <nav>
            <div id="title">
                <h1> BKM </h1>
                <h1> EVENTOS </h1>
            </div>

            <h2> BEM-VINDO!</h2>

            <!-- <div class="searchBox">
                <input class="searchInput" type="text" name="buscar" placeholder="Buscar Evento...">
                <button class="searchButton" type="submit" value="search" name="action" id="pesqEvento">
                    <i class="material-icons">
                        search
                    </i>
                </button>
            </div> -->
            <!-- <form action="" method="GET">
            <input type="text" name="buscar" placeholder="Buscar Evento">
            <input type="submit" value="search" name="action" id="pesqEvento">
        </form> -->

            <?php

            if (isset($data['resultado'])) {
                foreach ($data['resultado']  as $res) :
                    echo $res['nome_evento'];
                endforeach;
            }
            ?>

            <ul>
                <a href="./LandingController.php?action=LoadForm">
                    <li>Início</li>
                </a>
            </ul>

        </nav>
    </header>
    <main>

        <!-- <h1>Evento</h1> -->
        <?php $cd = $data['dados_evento'] ?>
        <div class="container-back">
            <div class="img-back" style="img src: /bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>">
                <img height="650px" width="auto" src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>" alt="Imagem do evento!">
                <? //= $cd['nome_evento']
                ?>
            </div>
            <? //= $cd['nome_evento'] 
            ?>
        </div>
        <div class="card-event">
            <img height="500" width="865" src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>" alt="Imagem do evento!">
            <div class="name-event">
                <h2><?= $cd['nome_evento'] ?></h2>
            </div>

        </div>
        <div class="container">

            <div class="info-event">

                <div class="data-event">
                    <h5> data do evento: </h5>
                    <label for="">dia: </label>
                    <?= $cd['data_evento'] ?>

                    <label for="">Horário :</label>
                    <?= $cd['horaI_evento'] ?>
                    >
                    <?= $cd['horaF_evento'] ?>
                </div>

                <div class="endereco-event">
                    <h5> Endereço: </h5>
                    <?= $cd['endereco_num']
                    ?>
                    <?= $cd['endereco_bairro']
                    ?>
                    <?= $cd['endereco_rua']
                    ?>
                    <?= $cd['cidade_evento']
                    ?>
                    <?= $cd['CEP_evento']
                    ?>
                </div>


                <div class="desc">
                    <h5> Descrição: </h5>
                    <?= $cd['descricao_evento']
                    ?>
                </div>

                <span>
                    <h5> Mais informações sobre o ingresso: </h5>
                    <?php if ($cd['ingresso'] == "") {
                        echo "Evento Gratuito";
                    } else {
                        echo  $cd['ingresso'];
                    }
                    ?>
                </span>

            </div>
        </div>



    </main>





    <!-- <img src="/bkmeventos/app/upload/<? //$cd['imagem_evento'] 
                                            ?>" alt="Imagem do evento!"> -->




</html>