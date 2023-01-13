<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "./../repository/OrganizadorRepository.php";

$organizador = new ControllerOrganizador();

class ControllerOrganizador
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

        $caminho = __DIR__ . "/../views/" . $path;
        if (file_exists($caminho)) {

            require $caminho;
        } else {

            $this->loadView("error/erro.php");
            echo ("<h2> Erro ao carregar a view<h2>");
        }
    }

    private function create()
    {

        $organizador = new OrganizadorModel();
        $organizador->setNome($_POST["nome"]);
        $organizador->setEmail($_POST["email"]);
        $organizador->setSenha($_POST["senha"]);
        $organizadorRepository = new OrganizadorRepository();
        $id = $organizadorRepository->create($organizador);
        if ($id) {
            $msg = "Registro inserido com sucesso.";
            //$this->loadView("organizadores/PaginaOrganizador.php");
            // } else if ($id == $organizador) {
            //     $msg = "Usuário já cadastrado!";
        } else {

            $msg = "Erro ao inserir o registro no banco de dados."; // criar uma view para isso

        }

        $this->findAll($msg);
    }

    private function loadForm()
    {

        $this->loadView("login/login.php", null, "teste");
    }

    private function findAll(string $msg = null)
    {

        $organizadorRepository = new OrganizadorRepository();
        $organizadores = $organizadorRepository->findAll();
        $data['titulo'] = "listar organizadores"; // ver sobre isso
        $data['organizadores'] = $organizadores;
        // $this->loadView("organizadores/PaginaOrganizador.php", $data);
        $this->loadView("organizadores/list.php", $data, $msg);
    }

    private function findOrganizadorById()
    {

        $idParam = $_GET['id'];
        $organizadorRepository = new OrganizadorRepository();
        $organizador = $organizadorRepository->findOrganizadorById($idParam);
        print "<pre>";
        print_r($organizador);
        print "</pre>";
    }

    private function deleteOrganizadorById()
    {

        $idParam = $_GET['id'];
        $organizadorRepository = new OrganizadorRepository();
        $qt = $organizadorRepository->deleteById($idParam);
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
        $organizadorRepository = new OrganizadorRepository();
        $organizador = $organizadorRepository->findOrganizadorById($idParam);
        $data['organizadores'][0] = $organizador;
        $this->loadView("organizadores/EditarOrganizador.php", $data); // criar uma view para issoa

    }

    private function update()
    {

        $organizador = new OrganizadorModel();
        $organizador->setId($_GET["id"]);
        $organizador->setNome($_POST["nome"]);
        $organizador->setEmail($_POST["email"]);
        $organizador->setSenha($_POST["senha"]); // $organizador->setSenha($_POST["senha"]);
        $organizadorRepository = new OrganizadorRepository();
        $atualizou = $organizadorRepository->update($organizador);
        if ($atualizou) {

            $msg = "Registro atualizado com sucesso.";
        } else {

            $msg = "Erro ao atualizar o registro no banco de dados.";
        }

        $this->findAll($msg);
    }

    private function preventDefault()
    {

        $this->loadView("error/erro.php");
        echo ("<h2>Ação indefinida...<h2>");
    }


    private function PaginaOrganizador()
    {

        session_start();
        $organizador = new OrganizadorRepository();
        if ($_SESSION["Logado"] == true) {

            $this->loadView("organizadores/PaginaOrganizador.php");
        } else {

            header("Location: ./LadingController.php?action=login");
        }
    }

    /*  private function login(){

            $organizador = new OrganizadorRepository();
            if(isset($_POST['login'])){

                $login = $organizador->loginOfOrg($_POST['email'], $_POST['senha']);

            if($login){

                header("location: ./OrganizadorController.php?action=PaginaOrganizador");

             }

            }

            $this->loadView("login/login.php");

        }*/

    private function voltar(string $msg = null)
    {

        $organizadorRepository = new OrganizadorRepository();
        $organizadores = $organizadorRepository->findAll();
        $data['titulo'] = "listar organizadores";
        $data['organizadores'] = $organizadores;
        $this->loadView("organizadores/list.php", $data, $msg);
    }
}
