<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar administrador</title>
</head>
<body>
<div class="main-edit"> 
<?php

include_once __DIR__ . "/../helpers/mensagem.php";

?>
<div class="conteiner">


<div class="right-main">
   <h3>Mantenha seus dados sempre atualizados!</h3>
</div>

<div class="left-main">
 <div class="card-edit"> 
  <div class="middle-main">  
   <h2> Editar administrador </h2>
    </div>
     <?php foreach($data['administradores'] as $adm): ?> 
      <div class="textfield"> 
       <form action="./AdministradorController.php?action=update&id=<?= $adm->getId()?>" method="POST"> 
        <label for="idn">Nome: </label> 
         <input type="text" name="nome" id="idn" value="<?= $adm->getNome(); ?>">
          <p/>
          <label for="ide">Email: </label> 
         <input type="text" name="email" id="ide" value="<?= $adm->getEmail(); ?>">
          <p/>
           <label for="ids">Senha:</label>
          <input type="password" name="senha" id="ids" value="<?= $adm->getSenha(); ?>">
         <p/>
         <button type="submit">Atualizar</button>
        <!--input type="submit" value="Atualizar"-->
       <button>Cancelar</button>
      </div>
     </div>
    </div>
   </form>		
  <?php endforeach; ?>
 </div>
</div>
</body>
</html>