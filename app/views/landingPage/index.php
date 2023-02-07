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
            <a href="LadingController.php?action=LoadForm">
                <li>  Início  </li>
            </a>
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
    <?php  isset( $data['cadastrar_evento'])?>
    <?php var_dump($data) ?>
        <?php $cd = $data['cadastrar_evento']?>
        <?=$cd['nome_evento' ]?>
        
        <div class="container">
          <span id="previous"><i data-feather="chevron-left"></i></span>
          
          <span id="next"><i data-feather="chevron-right"></i></span>
      
          <div id="slider" class="slider">
            <img src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>">
            <img src="../views/landingPage/componentes/img/Nahida.jpg">
            <img src="../views/landingPage/componentes/img/genshin.jpg">
            <img src="../views/landingPage/componentes/img/HD wallpaper_ Spider-Man, Spider-Man (PS4).jpg">
            <img src="../views/landingPage/componentes/img/HD wallpaper_ Video Game, The King Of Fighters XIV, Mai Shiranui.jpg">
          </div>
        </div>
        
        <div class="bullets-container">
          
        </div>
        
    </section>
      <!-- partial -->
        <script src='https://unpkg.com/feather-icons'></script><script  src="../views/landingPage/script.js"></script>
      
       </footer>

</body>

</html>