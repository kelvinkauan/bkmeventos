<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar dados administrador</title>
</head>
<body>
<?php

include_once __DIR__ . "/../helpers/mensagem.php";

?>
<h2> Editar adms </h2>
 <p/>
  <?php foreach($data['administradores'] as $adm): ?> 
   <form action="./AdministradorController.php?action=update&id=<?= $adm->getId()?>" method="POST"> <!--  &id= -->
	<label for="idn">Nome: </label> 
     <input type="text" name="nome" id="idn" value="<?= $adm->getNome(); ?>">
      <p/>
      <label for="ids">Senha:</label>
     <input type="password" name="senha" id="ids" value="<?= $adm->getSenha(); ?>">
    <p/>
   <input type="submit" value="Atualizar">
  <input type="reset" value="Limpar">
 </form>		
<?php endforeach; ?>

</body>
</html>