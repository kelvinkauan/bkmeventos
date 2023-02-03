<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/AdministradorRepository.php";
require_once __DIR__ . "./../repository/OrganizadorRepository.php";

$administrador = new ControllerAdministrador();

class ControllerAdministrador
{

    function __construct()
    {
        session_start();

        if (isset($_POST["action"])) {
            $action = $_POST["action"];
        } else if (isset($_GET["action"])) {
            $action = $_GET["action"];
        }
        if (isset($action)) {
            $this->callAction($action);
        } else {
            $this->loadView("error/erro.php");
            $msg = "<h2>Nenhuma ação a ser processada...<h2>";
            print_r($msg);
        }
    }

    public function callAction(string $functionName = null)
    {

        if (method_exists($this, $functionName)) {
            $this->$functionName();
        } else if (method_exists($this, "preventDefault")) {
            $met = "preventDefault";
            $this->$met();
        } else {
            throw new BadFunctionCallException("Usecase not exists");
        }
    }

    public function loadView(string $path, array $data = null, string $msg = null)
    {

        $caminho = __DIR__ . "./../views/" . $path;
        if (file_exists($caminho)) {
            require $caminho;
        } else {
            $this->loadView("error/erro.php");
            print "<h2>Erro ao carregar a view <h2>";
        }
    }

    public function create()
    {

        $administrador = new AdministradorModel();
        $administrador->setNome($_POST["nome"]);
        $administrador->setEmail($_POST['email']);
        $administrador->setSenha($_POST["senha"]);
        $administradorRepository = new AdministradorRepository();
        $id = $administradorRepository->create($administrador);
        if ($id) {
            $msg = "Registro inserido com sucesso.";
        } else {
            $msg = "Erro ao inserir o registro do administrador no banco de dados!";
        }
     
    }

    private function findAll(string $msg = null)
    {

        $administradorRepository = new AdministradorRepository();
        $administradores = $administradorRepository->findAll();
        $data['titulo'] = "administrador";
        $data['administradores'] = $administradores;
        $this->loadView("administrador/Admlist.php", $data, $msg);
        // $this->loadView("administrador/PaginaAdm.php", $data, $msg);
    }

    private function loadForm()
    {

        $this->loadView("../views/administrador/cadastroAdm.php", null, "teste");
    }

    private function findAdministradorById()
    {

        $idParam = $_GET['id'];
        $administradorRepository = new AdministradorRepository();
        $administrador = $administradorRepository->findAdministradorById($idParam);
        print "<pre>";
        print_r($administrador);
        print "</pre>";
    }

    private function deleteAdministradorById()
    {

        $idParam = $_GET['id'];
        $administradorRepository = new AdministradorRepository();
        $qt = $administradorRepository->deleteById($idParam);
        if ($qt) {
            $msg = "Registro excluído com sucesso.";
        } else {
            $msg = "Erro ao excluir o registro no banco de dados.";
        }
        $this->findAll($msg);
    }

    private function edit()
    {

        $idParam = $_GET['id'];
        $administradorRepository = new AdministradorRepository();
        $administrador = $administradorRepository->findAdministradorById($idParam);
        $data['administradores'][0] = $administrador;
        $this->loadView("administrador/EditarAdministrador.php", $data); // fazer view adm

    }

    private function update()
    {

        $administrador = new AdministradorModel();
        $administrador->setId($_GET["id"]);
        $administrador->setNome($_POST["nome"]);
        $administrador->setEmail($_POST['email']);
        $administrador->setSenha($_POST["senha"]);
        $administradorRepository = new AdministradorRepository();
        $att = $administradorRepository->update($administrador);
        if ($att) {
            $msg = '';
        } else {
            $msg = "Erro ao atualizar os dados no banco de dados!";
        }
        if ($_SESSION['Logado'] == true){
            header("location:/bkmeventos/app/controllers/AdministradorController.php?action=PaginaAdministrador");
        }else{
            $this->findAll($msg);
        }
    
    }

    private function preventDefault()
    {
        $this->loadView("error/erro.php");
        print("<h2>Ação indefinida...<h2>");
    }

    private function PaginaAdministrador(string $msg = null)
    {

        
        if ($_SESSION["Logado"] == true) {
            $listaDeOrg = new AdministradorRepository();
            $ListaOrg = $listaDeOrg->findOrg();
            $data['organizadores'] = $ListaOrg;

            /*-----------------------------------------*/

            $listaDeEvents = new AdministradorRepository();
            $listOfEvents = $listaDeEvents->findEvents();
            $data['eventos'] = $listOfEvents;


            $this->loadView("administrador/PaginaAdm.php", $data, $msg);
        } else {
            header("Location: AdministradorController.php?action=login");
        }
    }
    private function AdmEditOrg()
    {

        $idParam = $_GET['id'];
        $organizadorRepository = new OrganizadorRepository();
        $organizador = $organizadorRepository->findOrganizadorById($idParam);
        $data['organizadores'][0] = $organizador;
        $this->loadView("administrador/editarOrg/AdmEditOrg.php", $data); // criar uma view para issoa

    }

    private function AdmUpdateOrg()
    {

        $organizador = new OrganizadorModel();
        $organizador->setId($_GET["id"]);
        $organizador->setNome($_POST["nome"]);
        $organizador->setEmail($_POST["email"]);
        $organizador->setSenha($_POST["senha"]); // $organizador->setSenha($_POST["senha"]);
        $organizadorRepository = new OrganizadorRepository();
        $atualizou = $organizadorRepository->update($organizador);
        if ($atualizou) {

            $msg = "Registro atualizado com sucesso!";
        } else {

            $msg = "Erro ao atualizar o registro no banco de dados.";
        }
        if($_SESSION['Logado']==true){
                header("location:/bkmeventos/app/controllers/OrganizadorController.php?action=PaginaOrganizador");
            }else{
                $this->findAll($msg);
            }

        $this->PaginaAdministrador($msg);
    }
    private function AdmDeleteOrganizadorById()
    {

        $idParam = $_GET['id'];
        $organizadorRepository = new OrganizadorRepository();
        $qt = $organizadorRepository->deleteById($idParam);
        if ($qt) {

            $msg = "Registro excluído com sucesso!";
        } else {

            $msg = "Erro ao excluir o registro no banco de dados.";
        }

        $this->PaginaAdministrador($msg);
    }
    
    private function showAdmins()
    {
        $this->loadView("sobrenos/aboutUs.html");
    }

    private function AdmUpdateEvent()
    {

        $evento = new EventosModel;
        $evento->setNome($_POST["nome"]);
        $evento->setData($_POST["dia"]);
        $evento->setHorarioI($_POST["inicio"]);
        $evento->setHorarioF($_POST["final"]);
        $evento->setNomeRua($_POST["rua"]);
        $evento->setBairro($_POST["bairro"]);
        $evento->setNumRua($_POST["numero"]);
        $evento->setCEP($_POST["cep"]);
        $evento->setCidade($_POST["cidade"]);
        $evento->setDescricao($_POST["descricao"]);
        $evento->setImagem($_FILES["upload"]);
        $evento->setIngresso($_POST["ingresso"]);
        $evento->setId($_GET["id"]);
        $eventosRepository = new EventosRepository();
        $att = $eventosRepository->update($evento);

        if ($att) {
            $msg = "Atualizado com sucesso!";
        } else {
            $msg = "Erro ao atuallizar!";
        } if ($_SESSION['Logado'] == true){
            header("location:/bkmeventos/app/controllers/AdministradorController.php?action=PaginaAdministrador");
        }else{
            $this->findAll($msg);
        }
    }

    private function AdmEditEvent()
    {

        $idParam = $_GET['id'];
        $eventosRepository = new EventosRepository();
        $evento = $eventosRepository->findEventoById($idParam);
        $data['eventos'][0] = $evento;
        $this->loadView("eventos/editarEvento.php", $data);
    }

    private function AdmDeleteEventoById()
    {
        $idParam = $_GET['id'];
        $eventosRepository = new EventosRepository();
        $qt = $eventosRepository->deleteById($idParam);
        if ($qt) {
            $msg = "Evento excluído com sucesso!";
        } else {
            $msg = "Falha ao excluir evento!";
        } if ($_SESSION['Logado'] == true){
            header("location:/bkmeventos/app/controllers/AdministradorController.php?action=PaginaAdministrador");
        }else{
            $this->PaginaAdministrador($msg);
        }
        
    }
}