<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../stylePaginaOrganizador/styles/style.css" rel="stylesheet">
    <link href="../stylePaginaOrganizador/styles/fonts.css" rel="stylesheet">
   <!-- <link href="../views/landingPage/styles/media.css" rel="stylesheet">-->
   
    <title>Página Organizador</title>
</head>
<body>
<header>
        <div id="title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>
        <ul>
            <a href="./LadingController.php?action=LoadForm">
                <li>  Início  </li>
            </a>

            <a href="./OrganizadorController.php?action=findAll">
                <li> Editar dados </li>
            </a>
            <a href="./EventosController.php?action=loadForm">
            <li> Cadastrar evento </li>
            </a>
            <a href="./OrganizadorController.php?action=login">
            <li> sair </li>
            </a>
        


        </ul>
</header>
    <h2> BEM-VINDO </h2>

   
</body>
</html>