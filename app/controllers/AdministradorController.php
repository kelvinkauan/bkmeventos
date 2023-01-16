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

        $this->findAll($msg);
    }

    private function findAll(string $msg = null)
    {

        $administradorRepository = new AdministradorRepository();
        $administradores = $administradorRepository->findAll();
        $data['titulo'] = "administrador";
        $data['administradores'] = $administradores;
        $this->loadView("administrador/Admlist.php", $data, $msg);
        $this->loadView("administrador/PaginaAdm.php", $data);
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
            $msg = "Atualização realizada com sucesso!";
        } else {
            $msg = "Erro ao atualizar os dados no banco de dados!";
        }
        $this->findAll($msg);
    }

    private function preventDefault()
    {
        $this->loadView("error/erro.php");
        print("<h2>Ação indefinida...<h2>");
    }

    private function PaginaAdministrador(string $msg = null)
    {

        session_start();
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
}
