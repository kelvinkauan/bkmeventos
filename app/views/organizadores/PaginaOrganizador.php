<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../views/stylePaginaOrganizador/styles/style.css" rel="stylesheet">
    <link href="../views/stylePaginaOrganizador/styles/fonts.css" rel="stylesheet">
   <!-- <link href="../views/landingPage/styles/media.css" rel="stylesheet">-->
   
    <title>Página Organizador</title>
</head>
<body>

<header>
        <div id="title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>


        <h2> BEM-VINDO    </h2> 





        <ul>
            <a href="./LadingController.php?action=LoadForm">
                <li>Início</li>
            </a>
            <a href="./OrganizadorController.php?action=findAll">
                <li>Editar dados</li>
            </a>
            <a href="./EventosController.php?action=loadForm">
            <li>Cadastrar evento</li>
            </a>
            <a href="./OrganizadorController.php?action=login">
            <li>sair</li>
            </a>

        </ul>
</header>


<p class="dados"> seus dados</p>
     <div align="center">   
    <ul>
    <?php 
    if (isset($data['organizadores'])) {
        
                    $org = $data['organizadores'];


                    ?>
                       <li>
                           id: <?=$org['idOrganizador'] ?> <br> <br>
                           nome: <?= $org['nc_Organizador'] ?> <br> <br>
                           E-mail: <?= $org['email_Organizador'] ?> <br> <br>
                           Senha:  <?= $org['senha_Organizador'] ?> <br> <br>
                            [ <a href="./OrganizadorController.php?action=edit&id=<?= $org['idOrganizador'] ?>">Editar</a> ]
                            [ <a href="javascript:confirmarExclusaoOrganizador('<?= $org['nc_Organizador'] ?>', <?= $org['idOrganizador'] ?>)">Excluir</a> ]
                        
                        </li> 
              <?php 
               }?>
    </ul>

    </div>

   
</body>
</html>