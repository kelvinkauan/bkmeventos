<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="../styleLogin/style.css">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'> -->

    <title>bkmeventos login</title>
</head>

<body>

    <div>
     <form action="./OrganizadorController.php?action=login" method="POST">
    
       <input type="text" name="email"placeholder="email...">
        <p/>
         <input type="password" name="senha"  placeholder="Senha...">
        <p/>
       <input type="submit" value="Login">
       <input value="1" name="login" type="hidden">
       <a href="./OrganizadorController.php?action=voltar">voltar</a>
     </form>
      

    </div>
</body>
</html>