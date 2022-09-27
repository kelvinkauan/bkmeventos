<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bkmeventos login</title>
</head>
<body>

    <h2>Login Organizador</h2>

    <div class="login">
     <form action="./OrganizadorController.php?action=login" method="POST">
      <label for="idlog"> Login: </label>
       <input type="text" name="email" id="idlog" required placeholder="Email...">
        <p/>
         <label for="idpass"> Senha: </label>
         <input type="password" name="senha" id="idpass" required placeholder="Senha...">
        <p/>
       <input type="submit" value="login">
     </form>
    </div>
    <a href="./OrganizadorController.php?action=loadForm">Cadastrar novo</a>
</body>
</html>