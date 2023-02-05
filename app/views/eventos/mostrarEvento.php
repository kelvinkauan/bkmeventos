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
            </div>
        </div>
        <div class="card-event">
            <img height="500" width="865" src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>" alt="Imagem do evento!">
        </div>
        <div class="name-event">
            <h2><?= $cd['nome_evento'] ?></h2>
        </div>
        <div class="container">

            <div class="info-event">

                <div class="data-event">

                    <h5> Data do evento: </h5>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16" style="padding-right: 10;">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                        </svg>
                        <label for="">Dia: </label>
                        <?= $cd['data_evento'] ?>.
                    </p>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16" style="padding-right: 10;">
                            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                        </svg>
                        <label for="">Horário: </label>
                        <?= $cd['horaI_evento'] ?> > <?= $cd['horaF_evento'] ?>.
                    </p>
                </div>

                <div class="endereco-event">
                    <h5> Endereço: </h5>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16" style="padding-right: 10;">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>

                        <label for="">Bairro: </label>
                        <?= $cd['endereco_bairro'] ?>.
                    </p>

                    <p>
                        <label for="">Rua: </label>
                        <?= $cd['endereco_rua'] ?>.
                    </p>

                    <p>
                        <label for="">Número: </label>
                        <?= $cd['endereco_num'] ?>.
                    </p>

                    <p>
                        <label for="">Cidade: </label>
                        <?= $cd['cidade_evento'] ?>.
                    </p>

                    <p>
                        <label for="">Cep: </label>
                        <?= $cd['CEP_evento'] ?>.
                    </p>
                </div>


                <div class="desc">
                    <h5> Descrição: </h5>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16" style="padding-right: 10;">
                            <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z" />
                        </svg>
                        <?= $cd['descricao_evento'] ?>
                    </p>
                </div>

                <span>
                    <h5>Informações sobre o ingresso: </h5>
                    <p>

                        <?php if ($cd['ingresso'] == "") {
                            echo "Evento Gratuito";
                        } else {
                        ?> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16" style="padding-right: 10;">
                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                            </svg>O evento é pago! acesse o link para mais inforações:<a href="<?= $cd['ingresso'] ?> "> Compre o ingresso aqui! </a>
                        <?php } ?>
                    </p>
                </span>

            </div>
        </div>



    </main>





    <!-- <img src="/bkmeventos/app/upload/<? //$cd['imagem_evento'] 
                                            ?>" alt="Imagem do evento!"> -->




</html>