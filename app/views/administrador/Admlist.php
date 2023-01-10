<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administrador</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <script src="../views/helpers/excluiradm.js" type="text/javascript"></script>

</head>

<body>
  <?php

  include_once __DIR__ . "/../helpers/mensagem.php";

  ?>
  <header>

    <h1> Meus dados</h1>

  </header>
  <ul>
    <?php foreach ($data['administradores'] as $adm) : ?>
      <li>
        <? //= $adm['idAdministrador'] 
        ?> <!--  "- " -->
        <?= $adm['nome_Adm'] ?> -
        <?= $adm['email_Adm'] ?> -
        <?= $adm['senha_Adm'] ?>.
      </li>
    <?php endforeach; ?>
  </ul>
  <?php foreach ($data['administradores'] as $adm) : ?>
    <a href="./AdministradorController.php?action=edit&id=<?= $adm['idAdministrador'] ?>">Editar</a> -
  <?php endforeach; ?>

  <!-- excluir isso e colocar os organizadores e eventos aqui -->

  <?php foreach ($data['administradores'] as $adm) : ?>
    <a href="javascript:confirmarExclusaoAdministrador('<?= $adm['nome_Adm'] ?>', <?= $adm['idAdministrador'] ?>)"> Excluir </a>
  <?php endforeach; ?>

  <!--  <p>
[ <a href="./administradorController.php?action=loadForm"> Cadastrar-se </a>] -->

</body>

</html>