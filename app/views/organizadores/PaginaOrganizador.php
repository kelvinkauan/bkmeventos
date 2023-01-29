<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../views/stylePaginaOrganizador/styles/style.css" rel="stylesheet">
    <link href="../views/stylePaginaOrganizador/styles/fonts.css" rel="stylesheet">
    <script src="../views/helpers/excluirevento.js" type="text/javascript"></script>
    <script src="../views/helpers/funcoescrud.js" type="text/javascript"></script>

    <!-- <link href="../views/landingPage/styles/media.css" rel="stylesheet">-->

    <title>Página Organizador</title>
</head>

<body>

    <header>
        <div id="title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>


        <h2> BEM-VINDO </h2>





        <ul>
            <a href="./LandingController.php?action=LoadForm">
                <li>Início</li>
            </a>
            <a href="./OrganizadorController.php?action=edit&id=<?= $_SESSION['Org'] ?>">
                <li>Editar dados</li>
            </a>
            <a href="./EventosController.php?action=loadForm">
                <li>Cadastrar evento</li>
            </a>
            <a href="./OrganizadorController.php?action=login">
                <li>sair</li>
            </a>

        </ul>
    </header>


    <p class="dados"> seus dados</p>
    <div align="center">
        <ul>
            <?php
            if (isset($data['organizador'])) {

                $org = $data['organizador'];


            ?>
                <li>
                    id: <?= $org['idOrganizador'] ?> <br> <br>
                    nome: <?= $org['nc_Organizador'] ?> <br> <br>
                    E-mail: <?= $org['email_Organizador'] ?> <br> <br>
                    Senha: <?= $org['senha_Organizador'] ?> <br> <br>
                    [ <a href="javascript:confirmarExclusaoOrganizador('<?= $org['nc_Organizador'] ?>', <?= $org['idOrganizador'] ?>)">Excluir</a> ]

                </li>
            <?php
            } ?>

        </ul>
    </div>

    <p class="eventos"> Seus eventos</p>

    <div>
        <ul>
            <?php
            if (isset($data['cadastrar_evento'])) {
                foreach ($data['cadastrar_evento'] as $event) : {
            ?>
                        <li>
                            <?= $event['idCadastrar'] ?>
                            <?= $event['nome_evento'] ?>
                            <?= $event['data_evento'] ?>
                            <?= $event['horaI_evento'] ?>
                            <?= $event['horaF_evento'] ?>
                            <?= $event['endereco_bairro'] ?>
                            <?= $event['endereco_rua'] ?>
                            <?= $event['endereco_num'] ?>
                            <?= $event['cidade_evento'] ?>
                            <?= $event['cep_evento'] ?>
                            <?= $event['descricao_evento'] ?>
                            <?= $event['ingresso'] ?>
                            <img src="/bkmeventos/app/upload/<?= $event['imagem_evento'] ?>">
                            [<a href="./EventosController.php?action=edit&id=<?= $event['idCadastrar'] ?>">Editar</a>]
                            [<a href="javascript: confirmarExclusãoEvento('<?= $event['nome_evento'] ?>', <?= $event['idCadastrar'] ?>)"> Excluir </a>]
                        </li>


            <?php
                    }
                endforeach;
            } ?>
        </ul>
    </div>
</body>

</html>