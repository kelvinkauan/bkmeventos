<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "./../repository/OrganizadorRepository.php";
require_once __DIR__ . "/../repository/AdministradorRepository.php";

$lading = new ControllerLanding();

class ControllerLanding
{


    function __construct()
    {

        if (isset($_POST["action"])) {
            $action = $_POST["action"];
        } elseif (isset($_GET["action"])) {
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

        $caminho = __DIR__ . "/../views/" . $path;
        if (file_exists($caminho)) {
            require $caminho;
        } else {
            $this->loadView("error/erro.php");
            echo ("<h2> Erro ao carregar a view<h2>");
        }
    }

    private function loadForm()
    { //loadFormNew

        $this->loadView("landingPage/index.html", null, "teste");
    }

    private function login()
    {

        $administrador = new AdministradorRepository();
        $organizador = new OrganizadorRepository();
        if (isset($_POST['login'])) {
            $loginOrg = $organizador->loginOfOrg($_POST['email'], $_POST['senha']);
            $loginAdm = $administrador->loginOfAdm($_POST['email'], $_POST['senha']);
            if ($loginOrg) {
                header("location: ./OrganizadorController.php?action=PaginaOrganizador");
            } else if ($loginAdm) {
                header("location: ./AdministradorController.php?action=PaginaAdministrador");
            }
        }
        $this->loadView("login/login.php");
    }
}
