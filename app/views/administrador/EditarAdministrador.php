<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/administrador/cssAdm/PanelAdm.css">
    <link rel="stylesheet" href="../views/stylePaginaOrganizador/styles/fonts.css">
    <script src="../views/helpers/excluiradm.js" type="text/javascript"></script>
    <title>Página do Administrador</title>

</head>

<body>
    <nav>
        <div id=" title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>

        <h2> BEM-VINDO!</h2>


        <ul>
            <a href="AdministradorController.php?action=findAll">
                <li>Início</li>
            </a>

            </a>
            <a href="./LandingController.php?action=loadForm">
                <li>sair</li>
            </a>

        </ul>
    </nav>

    <p class=" dados"> seus dados</p>

    <header>
        <h3>Mantenha seus dados sempre atualizados! </h3>
    </header>

    <?php
    include_once __DIR__ . "/../helpers/mensagem.php";
    ?>

    <div class="container">
        <h4>Editar meu dados</h4>
        <div class="edit-adm">
            <table class="org">
                <?php foreach ($data['administradores'] as $adm) : ?>
                    <form action="./AdministradorController.php?action=update&id=<?= $adm->getId() ?>" method="POST">
                        <div class="input-box">
                            <label for="idn">Nome: </label>
                            <input type="text" name="nome" id="idn" value="<?= $adm->getNome(); ?>">
                        </div>

                        <div class="input-box">
                            <label for="ide">Email: </label>
                            <input type="text" name="email" id="ide" value="<?= $adm->getEmail(); ?>">
                        </div>

                        <div class="input-box">
                            <label for="ids">Senha:</label>
                            <input type="password" name="senha" id="ids" value="<?= $adm->getSenha(); ?>">
                        </div>

                        <!--     -->
                        <!--input type="submit" value="Atualizar"-->
                        <div class="save-button">
                            <button>
                                <a type="submit" class="btn">Salvar</a>
                            </button>

                            <button>
                                <a type="submit" href="AdministradorController.php?action=findAll" class="btn">Cancelar</a></button>
                        </div>
                    </form>
                <?php endforeach; ?>

            </table>


            </ul>
        </div>
    </div>

    </table>

    </div>

    </div>

    <footer style="padding-top: 5vh">
        <p class="footer-p">&copy; BKM EVENTOS </p>
    </footer>
</body>

</html>