<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/administrador/cssAdm/PanelAdm.css">

    <title>Página do Administrador</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6F3Df4;">
        <a class="navbar-brand mb-0 h1 container-fluid">
            <span>BKM EVENTOS</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="d-flex align-items-center">
            <a type="button" class="btn btn-link px-3 me-2" href="./AdministradorController.php?action=findAll">
                Meus Dados
            </a>
            <div class="d-flex align-items-center">
                <a type="button" class="btn btn-link-autoline px-3 me-2" href="./LadingController.php?action=loadForm">
                    sair
                </a>
            </div>
        </div>
    </nav>

    <header>
        <h2>Págia do Administrador</h2>
    </header>

    <?php

    include_once __DIR__ . "/../helpers/mensagem.php";

    ?>


    <div class="container">
        <div class="my-data">
            <h4>Organizadores Cadastrados:</h4>
            <ul>
                <?php if (isset($data['organizadores'])) {
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
            </ul>
        </div>
    </div>
</body>

</html>