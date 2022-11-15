<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="stylesheet" type="text/css" href="../views/helpers/estilos.css">
    <script src="../helpers/excluiradm.js" type="text/javascript"></script>

</head>
<body>
<?php

	include_once __DIR__ . "/../helpers/mensagem.php";

?>

    <h1>administradores</h1>
    <ul>
        <?php foreach($data['administradores'] as $adm): ?>

            <li>
                <?= $adm['idAdministrador'] ?> -
                <?= $adm['nome_Adm'] ?> -
                <?= $adm['senha_Adm'] ?> -
                [ <a href="./AdministradorController.php?action=edit&id=<?= $adm['idAdministrador'] ?>">Editar</a> ]
                [ <a href="javascript:confirmarExclusaoAdministrador('<?= $adm['nome_Adm'] ?>', <?= $adm['idAdministrador']?>)">Excluir</a> ] 
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
    [ <a href="./administradorController.php?action=loadForm"> Cadastrar-se </a>] 

</body>
</html>