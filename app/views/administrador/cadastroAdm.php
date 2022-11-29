<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Adm </title>
</head>
<body>
    
<form action="./AdministradorController.php?action=create" method="POST">
 <input type="text" name="nome" placeholder="Nome" />
 <input type="password" name="senha" placeholder="Senha"/>
 <button type="submit" value="Cadastrar">Cadastrar</button>
</form>
</body>
</html>