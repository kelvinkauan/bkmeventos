<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>

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

    <h1>administrador</h1>
    <ul>
        <?php foreach($data['administradores'] as $adm): ?>

            <li>
                <?= $adm['idAdministrador'] ?> -
                <?= $org['nome_Adm'] ?> -
                <?= $org['senha_Adm'] ?> -
            </li>
        <?php endforeach; ?>
    </ul>

</html>>
