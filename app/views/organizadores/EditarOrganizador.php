<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Organizador</title>
</head>
<body>
<?php

	include_once __DIR__ . "/../helpers/mensagem.php";

?>

<h2> Editar Organizadores </h2>
 <p/>
  <?php foreach($data['organizadores'] as $org): ?> <!-- $organizadores -->
   <form action="./OrganizadorController.php?action=update&id=<?= $org->getId()?>" method="POST"> <!--  &id= -->
	  <label for="idn">Nome: </label> 
     <input type="text" name="nome" id="idn" value="<?= $org->getNome(); ?>">
	    <p/>
	     <label for="ide">Email:</label>  
        <input type="email" name="email" id="ide" value="<?= $org->getEmail(); ?>">
       <p/>
      <label for="ids">Senha:</label>
     <input type="password" name="senha" id="ids" value="<?= $org->getSenha(); ?>">
    <p/>
   <input type="submit" value="Atualizar">
  <input type="reset" value="Limpar">
 </form>		
<?php endforeach; ?>

</body>
</html>