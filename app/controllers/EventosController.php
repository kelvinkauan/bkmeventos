<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "./../repository/EventosRepository.php";

$evento = new ControllerEventos();

class ControllerEventos{
    function __construct(){

        if(isset($_POST["action"])){

            $action = $_POST["action"];

        }else if(isset($_GET["action"])){

            $action = $_GET["action"];

        }

        if(isset($action)){

            $this->callAction($action);

        }else{

            $msg = "Nenhuma acao a ser processada...";

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

            print "Erro ao carregar a view";

        }
    }

public function CriarEvento(){
    $evento = new EventosModel();
    $evento -> setNome($_POST["nome"]);
    $evento -> setData($_POST["data"]);
    $evento -> setHorarioI($_POST["horarioI"]);
    $evento -> setHorarioF($_POST["horarioF"]);
    $evento -> setNomeRua($_POST["nomeRua"]);
    $evento -> setBairro($_POST["bairro"]);
    $evento -> setNumRua($_POST["numRua"]);
    $evento -> setCEP($_POST["CEP"]);
    $evento -> setCidade($_POST["cidade"]);
    $evento -> setDescricao($_POST["descricao"]);

    $eventosRepository = new EventosRepository();

    $id = $eventosRepository -> create($evento);

    if($id){
        $msg = "Evento cadastrado com sucesso";
    }else{
        $msg = "Erro ao cadastrar evento";
        }

    $this->findAll();
}

private function loadForm(){

    $this->loadView("../views/eventos/eventos.php", null, "teste");

}

private function findAll(string $msg = null){

    $eventosRepository = new EventosRepository();
    $eventos = $eventosRepository -> findAll();
    $data['titulo'] = "listar eventos";
    $data['cadastrar_eventos'] = $eventos;
    $this-> loadView("eventos/eventoList.php", $data, $msg);
}





private function update(){
    
    $evento = new EventosModel;
    $evento -> setNome($_POST["nome"]);
    $evento -> setData($_POST["data"]);
    $evento -> setHorarioI($_POST["horarioI"]);
    $evento -> setHorarioF($_POST["horarioF"]);
    $evento -> setNomeRua($_POST["nomeRua"]);
    $evento -> setBairro($_POST["bairro"]);
    $evento -> setNumRua($_POST["numRua"]);
    $evento -> setCEP($_POST["CEP"]);
    $evento -> setCidade($_POST["cidade"]);
    $evento -> setDescricao($_POST["descricao"]);

    $eventosRepository = new EventosRepository();

    $att = $eventosRepository ->update($evento);

    if ($att) {

        $msg= "Atualizado com sucesso";
    }else{
        $msg="Erro ao atuallizar";
    }

    
    $this->findAll($msg);
}

private function deleteById(){
    $idParam = $_GET['id'];

    $eventosRepository = new EventosRepository();
    $qt = $eventosRepository -> deleteById($idParam);

    if($qt){
        $msg = "Evento excluído com sucesso";
    }else{
        $msg = "Falha ao excluir evento";
    }

    $this-> findAll($msg);


}





}