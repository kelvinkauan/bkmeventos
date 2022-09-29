<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bkmeventos login</title>
</head>
<body>

    <h2>Login </h2>

    <div class="login">
     <form action="" method="POST"> <!-- ./OrganizadorController.php?action=login -->
      <label for="idlog"> Login: </label>
       <input type="text" name="email" id="idlog" required placeholder="Email...">
        <p/>
         <label for="idpass"> Senha: </label>
         <input type="password" name="senha" id="idpass" required placeholder="Senha...">
        <p/>
       <input type="submit" value="fazer login" name="entrar">
     </form>
    </div>
</body>
</html>