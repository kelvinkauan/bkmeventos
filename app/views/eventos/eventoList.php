<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../views/stylePaginaOrganizador/styles/fonts.css">
    <link rel="stylesheet" href="../views/eventos/style/card.css">


    <title>Eventos</title>
</head>

<body>

    <nav>
        <div id="title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>

        <h2> BEM-VINDO!</h2>


        <ul>
            <a href="./LandingController.php?action=LoadForm">
                <li>Início</li>
            </a>

            <a href="./LandingController.php?action=loadForm">
                <li>sair</li>
            </a>

        </ul>
    </nav>
    <?php

    include_once __DIR__ . "/../helpers/mensagem.php";

    ?>

    <h1>Eventos</h1>
    <div class="container">
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
                                <?= $cd['descricao_evento'] ?>
                            </p>
                            <button><a class="button-link" href="./LandingController.php?action=loadForm">Mais informações!</a></button>
                        </figcaption>

                    </figure>
                </span>
            <?php endforeach; ?>
            <p>

        </div>
    </div>
</body>

</html>