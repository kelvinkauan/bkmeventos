<!DOCTYPE html>

<html lang="en">    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../views/stylePaginaOrganizador/styles/fonts.css">
    <!-- <link rel="stylesheet" href="../stylePaginaOrganizador/styles/fonts.css"> -->
    <link rel="stylesheet" href="../views/eventos/style/card.css">
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

    
    <div class="container">
    <h4>Eventos</h4>
    <div class="container-card">
        <?php foreach ($data['resultado'] as $cd) : ?>
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
                        <button><a class="button-link" href="./EventosController.php?action=ShowEventById&id=<?= $cd['idCadastrar']?>"> Mais informações!</a></button>
                    </figcaption>

                </figure>
            </span>
        <?php endforeach; ?>
        <p>

   
    

</body>

</html>