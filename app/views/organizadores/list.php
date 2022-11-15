<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="stylesheet" type="text/css" href="../views/helpers/estilos.css">
    <script src="../views/helpers/funcoescrud.js" type="text/javascript"></script>

</head>
<body>
<?php

	include_once __DIR__ . "/../helpers/mensagem.php";

?>

    <h1>Organizadores</h1>
    <ul>
        <?php foreach($data['organizadores'] as $org): ?>

            <li>
                <?= $org['idOrganizador'] ?> -
                <?= $org['nc_Organizador'] ?> -
                <?= $org['email_Organizador'] ?> -
                <?= $org['senha_Organizador'] ?> -
                [ <a href="./OrganizadorController.php?action=edit&id=<?= $org['idOrganizador'] ?>">Editar</a> ]
                [ <a href="javascript:confirmarExclusaoOrganizador('<?= $org['nc_Organizador'] ?>', <?= $org['idOrganizador']?>)">Excluir</a> ]
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
    [ <a href="./OrganizadorController.php?action=loadForm"> Cadastrar-se </a> ]  <!-- colocar no view principal -->

    [ <a href="./OrganizadorController.php?action=login"> login </a> ]

</body>
</html>