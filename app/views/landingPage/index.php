<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../views/landingPage/styles/style.css" rel="stylesheet">
    <link href="../views/landingPage/styles/fonts.css" rel="stylesheet">
    <link href="../views/landingPage/styles/media.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
   
    <style>
        h1:hover {
            color: #6F3Df4;
        }
        .btn:hover{
            color: black;
            background-color: transparent;
            border: 1px solid #6F3Df4;
            transition: 0.5s;
        }
         
    </style>

    <title> Bkm eventos</title>
</head>

<body>
    <header>
        
        <div id="title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>

        <ul>
            <!-- <a href="LadingController.php?action=LoadForm">
                <li>  Início  </li>
            </a> -->
            <a href="EventosController.php?action=findAll">
                <li>  Eventos  </li>
            </a>
            <a href="AdministradorController.php?action=showAdmins">
                <li>  Sobre Nós </li>
            </a>
            
            <a href= "LandingController.php?action=login" id="Cadastre-se-btn">
                <li>Já tem uma conta?</li>
            </a>
        </ul>
    </header>

    <main>
        
        <aside>
            <h2> <span> Divulgue seu evento</span> </h2>
            <h2> no BKM Eventos </h2>
            <p>
                Cadastre todos os dados do seu evento em nossa plataforma gratuitamente, nós ajudamos a gerenciar seus
                eventos de forma eficiente.

            </p>
            
                <form action="./LandingController.php?action=login" method="POST">
                    <input type="submit" value="Crie agora seu evento!" id="btn" class="btn">
                </form>
            
            

        </aside>

        <article>
            <img src="../views/landingPage/componentes/images/pngegg.png" alt="geek">

        </article>

    </main>
    <!-- <div class="teste" style="background-color: blueviolet;">
        aaaaaaaaaaaaaaaaaaaaaa  
    </div> -->

    
    <section>
  
    
        
    <div class="container">
          <span id="previous"><i data-feather="chevron-left"></i></span>
          
          <span id="next"><i data-feather="chevron-right"></i></span>
      
          <div id="slider" class="slider">
          <?php  
   
            foreach( $data['cadastrar_evento'] as $cd):?>

            <img height="500" width="1000" src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>">
           
            <?php endforeach;?>
          </div>
        </div>
        <div class="bullets-container">
        </div>
        </form>
        <script src='https://unpkg.com/feather-icons'></script><script  src="../views/landingPage/script.js"></script>
        <br>
        <p><h1>Eventos Recentes</h1></p>
        <div class="container_evento">
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
    </section>

      <!-- partial -->
        
      
       </footer>

</body>

</html>