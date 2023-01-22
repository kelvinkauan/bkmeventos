<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="../views/administrador/cssAdm/ButtonStyles.css">

    <title>editar administrador</title>
</head>

<body>
    <div class="toast">
        <div class="toast-content">
            <i class="fas fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1">Salvo com successo!</span>
                <span class="text text-2">Suas alterações foram salvas.</span>
            </div>
        </div>
        <i class="fa-solid fa-xmark close"></i>
        <div class="progress"></div>
    </div>
    <script src="../views/adminstrador/JS/ButtonScript.js"></script>
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
                <?php foreach ($data['administradores'] as $adm) : ?>
                    <div class="textfield">
                        <form action="./AdministradorController.php?action=update&id=<?= $adm->getId() ?>" method="POST">
                            <label for="idn">Nome: </label>
                            <input type="text" name="nome" id="idn" value="<?= $adm->getNome(); ?>">
                            <p />
                            <label for="ide">Email: </label>
                            <input type="text" name="email" id="ide" value="<?= $adm->getEmail(); ?>">
                            <p />
                            <label for="ids">Senha:</label>
                            <input type="password" name="senha" id="ids" value="<?= $adm->getSenha(); ?>">
                            <p />
                            <!--     -->
                            <!--input type="submit" value="Atualizar"-->

                            <button type="submit" class="btn">Salvar</button>
                            <!-- <script src="../views/administrador/JS/ButtonScript.js"></script> -->

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