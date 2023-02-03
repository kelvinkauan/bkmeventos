<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "./../repository/EventosRepository.php";

$evento = new ControllerEventos();

class ControllerEventos{
    function __construct(){
        session_start();

        if(isset($_POST["action"])){
            $action = $_POST["action"];
        }else if(isset($_GET["action"])){
            $action = $_GET["action"];
        }
        if(isset($action)){
            $this->callAction($action);
        }else{
            $this->loadView("error/erro.php");
            $msg = "<h2>Nenhuma acao a ser processada...<h2>";
            print_r($msg);
        }

    }

    public function callAction(string $functionName = null){

        if (method_exists($this, $functionName)) {
            $this->$functionName();
        } else if(method_exists($this, "preventDefault")) {
            $met = "preventDefault";
            $this->$met();
        } else {
            throw new BadFunctionCallException("Usecase not exists");

        }
    }

    public function loadView(string $path, array $data = null, string $msg = null){

        $caminho = __DIR__ . "./../views/" . $path; 
        if(file_exists($caminho)){
            require $caminho;
        } else {
            $this->loadView("error/erro.php");
            print "<h2>Erro ao carregar a view<h2>";
        }
    }

    private function create(){ 

        $evento = new EventosModel();
        $evento->setNome($_POST["nome"]);
        $evento->setData($_POST["dia"]);
        $evento->setHorarioI($_POST["inicio"]);
        $evento->setHorarioF( $_POST["final"]);
        $evento->setNomeRua($_POST["rua"]);
        $evento->setBairro($_POST["bairro"]);
        $evento->setNumRua($_POST["numero"]);
        $evento->setCEP($_POST["cep"]);
        $evento->setCidade($_POST["cidade"]);
        $evento->setDescricao($_POST["descricao"]);
        $evento->setIngresso($_POST["ingresso"]);
        $evento -> setImagem($_FILES["upload"]);
        $eventoRepository = new EventosRepository();
        $id = $eventoRepository->create($evento);
        if($id){
            $msg = "Evento cadastrado com sucesso";
        }else{
            $msg = "Erro ao cadastrar evento";
            }
            if($_SESSION['Logado']==true){
                header("location:/bkmeventos/app/controllers/OrganizadorController.php?action=PaginaOrganizador");
            }else{
                $this->findAll($msg);
            }

    }

    private function loadForm(){

        $this->loadView("eventos/eventos.php", null, "teste");

    }
 
    private function findAll(string $msg = null){

        $eventosRepository = new EventosRepository();
        $eventos = $eventosRepository->findAll();
        $data['titulo'] = "listar eventos";
        $data['cadastrar_evento'] = $eventos;
        $this-> loadView("eventos/eventoList.php", $data, $msg);
    }

    private function update(){
        
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
      
        if ($att){
            $msg= "Atualizado com sucesso";
        }else{
            $msg="Erro ao atuallizar";
        }
        if($_SESSION['Logado']==true){
            header("location:/bkmeventos/app/controllers/OrganizadorController.php?action=PaginaOrganizador");
        }else{
            $this->findAll($msg);
        }

    }

    private function deleteEventoById(){

        $idParam = $_GET['id'];
        $eventosRepository = new EventosRepository();
        $qt = $eventosRepository->deleteById($idParam);
        if($qt){
            $msg = "Evento excluído com sucesso";
        }else{
            $msg = "Falha ao excluir evento";
        }
        if($_SESSION['Logado']==true){
            header("location:/bkmeventos/app/controllers/OrganizadorController.php?action=PaginaOrganizador");
        }else{
            $this->findAll($msg);
        }

    }

    private function edit(){
                
        $idParam = $_GET['id'];
        $eventosRepository = new EventosRepository();
        $evento = $eventosRepository->findEventoById($idParam);
        $data['eventos'][0] = $evento;
        $this->loadView("eventos/editarEvento.php", $data); 

    }

   
    private function search(){  

        $pesquisarRepository = new EventosRepository();
        $data=[];
        if(isset($_GET['buscar'])){

           $search = $pesquisarRepository->pesquisar($_GET['buscar']);
           $data['resultado'] = $search;
        }
        $this->loadView("pesquisar/pesquisar.php", $data);
      }


      
        private function ShowEventById(string $msg =null){
            $idParam = $_GET['id'];
            var_dump($_GET);
            $eventosRepository = new EventosRepository();
            $evento = $eventosRepository->Show($idParam);
            $data['cadastrar_evento'] = $evento;
            $this->loadView("eventos/CardEventos.php", $data); 

        }
        private function TesteShowById(){
            $evento = new EventosModel;
            $evento->setId($_GET["id"]);
            // $evento->setNome($_POST["nome"]);
            $eventosRepository = new EventosRepository();
            $data['dados_evento'] = $eventosRepository->Show($evento);
            //var_dump($data['dados_evento']);
            $this->loadView("eventos/CardEventos.php",$data);
        }


}
       

    

    


