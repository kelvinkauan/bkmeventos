<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do organizador</title>
</head>
<body>

<h2>Cadastro de Organizadores</h2>
<div> 
 <p/>
  <form action="./OrganizadorController.php?action=create" method="POST">
   <label for="idn">Nome:</label>
    <input type="text" name="nome" id="idn" placeholder="Nome completo...">
     <p/>
      <label for="ide">Email: </label>
	   <input type="text" name="email" id="ide" placeholder="Email...">
	   <p/> 
      <label for="ids">Senha: </label>
	 <input type="password" name="senha" id="ids" placeholder="Senha...">
    <p/>
   <input type="submit" value="Cadastrar">
  <input type="reset" value="Limpar">
 </form>
</div>
</body>
</html>