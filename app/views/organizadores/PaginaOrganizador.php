
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/administrador/cssAdm/PanelAdm.css">
    <link rel="stylesheet" href="../views/stylePaginaOrganizador/styles/fonts.css">
    <script src="./../views/helpers/excluirevento.js" type="text/javascript"></script>
    <style>
        h1:hover {
            color: #6F3Df4;
        }
    </style>
    <title>Página do Organizador</title>

</head>

<body>
    <nav>
        <div id="title">
            <h1> BKM </h1>
            <h1> EVENTOS </h1>
        </div>

        <h2> BEM-VINDO!</h2>


        <ul>
            <!-- <a href="./LandingController.php?action=LoadForm">
                <li>Início</li>
            </a> -->

            <a  href="./OrganizadorController.php?action=edit&id=<?=$_SESSION['Org'] ?>" >
                <li>Editar dados</li>
            </a>

            <a href="./EventosController.php?action=loadForm">
                <li>Cadastrar evento</li>
            </a>
            <a href="./LandingController.php?action=loadForm">
                <li>Sair</li>
            </a>

        </ul>
    </nav>

    <p class=" dados"> seus dados</p>

    <header>
        <h3>Página do Organizador</h3>
    </header>

    <?php
    include_once __DIR__ . "/../helpers/mensagem.php";
    ?>

    <div class="container">
        <h4>Seus dados</h4>
        <div class="my-data">
            
            <table class="org-panel">
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>

                <tr>
                    <?php if (isset($data['organizador'])) {
                          $org = $data['organizador'];
                        ?>

                            <td><?= $org['idOrganizador']?></td>
                            <td><?= $org['nc_Organizador'] ?></td>
                            <td><?= $org['email_Organizador'] ?></td>
                            <td><?= $org['senha_Organizador'] ?></td>
                            <td><a href="./OrganizadorController.php?action=edit&id=<?=$_SESSION['Org'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="70" height="16" fill="currentColor" class="bi bi-pen" viewBox="-25 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                    </svg></a></td>
                            <td><a href="javascript:confirmarAdmExcluiOrg('<?= $org['nc_Organizador'] ?>',<?= $org['idOrganizador'] ?>)"><svg xmlns="http://www.w3.org/2000/svg" width="70" height="16" fill="currentColor" class="bi bi-trash3 d-flex justify-content-around" viewBox="-25 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg></a></td>
                </tr>
        <?php
                    }  ?>
            </tbody>
            </table>


            </ul>
        </div>
    </div>
    <div class="container">
        <h4>Eventos Cadastrados</h4>
        <div class="events-data">
            <table class="event">
                <tr>
                    <th>Id</th>
                    <th>Nome Evento</th>
                    <th>Data</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Cep</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>

                <tr>
                    <?php if (isset($data['cadastrar_evento'])) {
                       foreach($data['cadastrar_evento'] as $event):{
                            ?>
                            <li>
                           <td><?= $event['idCadastrar']?></td>
                                <td> <?= $event ['nome_evento']?></td>
                                 <td><?=  $event['data_evento']?></td>
                                 <td><?=  $event ['endereco_bairro']?></td>
                                 <td><?=  $event ['cidade_evento']?></td>
                                   <td><?=  $event ['cep_evento']?></td>
                                   <td><a href="./EventosController.php?action=edit&id=<?= $event['idCadastrar'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="16" fill="currentColor" class="bi bi-pen" viewBox="-15 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                    </svg></a>
                            <td><a href="javascript: confirmarExclusãoEvento('<?= $event['nome_evento'] ?>',<?= $event['idCadastrar'] ?>)"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="16" fill="currentColor" class="bi bi-trash3" viewBox="-17 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </a>


                </tr>
                
        <?php } endforeach;
                    } ?>
            </table>

        </div>

    </div>

    <footer>
        <p class="footer-p">&copy; BKM EVENTOS </p>
    </footer>
</body>

</html>