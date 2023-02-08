
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../views/stylePaginaOrganizador/styles/fonts.css">
    <link rel="stylesheet" href="../stylePaginaOrganizador/styles/fonts.css">
    <link rel="stylesheet" href="../views/eventos/style/card.css">
    <!-- <link href="../views/landingPage/styles/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <!-- <link rel="stylesheet" href="../eventos/style/card.css"> -->
    <title>Eventos</title>
</head>

<body>

    <nav>
        <div id="title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>

        <ul>
            <a href="./LandingController.php?action=LoadForm">
                <li>Início</li>
            </a>
        </ul>

      
        <form action="">
            <div class="searchBox">
                <input class="searchInput" type="text" name="buscar" placeholder="Buscar Evento...">
                <button class="searchButton" type="submit" value="search" name="action" id="pesqEvento">
                    <i class="material-icons">
                        search
                    </i>
                </button>
            </div>
        </form>
    


    

    </nav>
    <?php

    include_once __DIR__ . "/../helpers/mensagem.php";

    ?>



    <main>
       <div class="container_evento">
        <h4>Eventos</h4>
        <div class="container-card">
       
            <?php foreach ($data['cadastrar_evento'] as $cd) : ?>
                <span class="sp">
                    <figure class="img-block">
                         
                        <h2> <?= $cd['nome_evento']
                                ?></h2>
                        <img src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>" alt="Imagem do evento!">

                        <figcaption>
                            <h3>Mais informações!</h3>
                            <p>
                                          
                                <?= $cd['data_evento'] ?> , 
                                <?= $cd['cidade_evento'] ?>
                                
                            </p>
                            <button><a class="button-link" href="./EventosController.php?action=ShowEventById&id=<?= $cd['idCadastrar']?>"> Mais informações!</a></button>
                        </figcaption>

                    </figure>
                </span>
            <?php endforeach; ?>
            <p>
        </div>
    </div>
    </main>
     
    
</body>

</html>