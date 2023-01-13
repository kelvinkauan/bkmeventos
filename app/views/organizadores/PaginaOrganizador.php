<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Organizador</title>
</head>

<body>
    <h1> BEM-VINDO </h1>
    <?php
    if (isset($data['organizadores'])) {
        foreach ($data['organizadores'] as $org) : ?>

            <li>
                <?= $org['idOrganizador'] ?> -
                <?= $org['nc_Organizador'] ?> -
                <?= $org['email_Organizador'] ?> -
                <?= $org['senha_Organizador'] ?> -
                [ <a href="./OrganizadorController.php?action=edit&id=<?= $org['idOrganizador'] ?>">Editar</a> ]
                [ <a href="javascript:confirmarExclusaoOrganizador('<?= $org['nc_Organizador'] ?>', <?= $org['idOrganizador'] ?>)">Excluir</a> ]
            </li>
    <?php endforeach;
    } ?>
    <br>

    <a href="./LadingController.php?action=loadForm">sair</a> -

    <a href="./EventosController.php?action=loadForm">Cadastrar evento</a>

    <h1>Seus Eventos</h1>


</body>

</html>