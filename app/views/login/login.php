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
     <form action="./organizadorController.php?action=login" method="POST">
      <label for="idlog"> Login: </label>
       <input type="text" name="nome" id="idlog" required placeholder="Nome Completo...">
        <p/>
         <label for="idpass"> Senha: </label>
           <input type="password" name="senha" id="idpass" required placeholder="Senha...">
          <br>
         <input type="submit" value="login">
       <br>
      <a href="../organizadores/CadastroOrganizador.php">Cadastre-se aqui</a>
     </form>
    </div>
    
</body>
</html>