<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "./PesquisaRep.php";

class PesquisarController{

    function __construct(){

        if(isset($_POST["action"])){
            $action = $_POST["action"];
        }else if(isset($_GET["action"])){
            $action = $_GET["action"];
        }
        if(isset($action)){
            $this->callAction($action);
        }else{
            $this->loadView("error/erro.php");
            $msg = "<h2>Nenhuma ação a ser processada...<h2>";
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
            $this->loadView("error/erro.php");
            $bad = "<h2>Caso de uso não existe</h2>";
            print $bad;

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

    private function search(){
        
      $idParam = $_GET['buscar'];
      $pesquisarRepository = new pesquisarRepository();
      if(!isset($idParam)){
            header("Location: search.php");
            echo "Evento não encontrado";
        }else if(isset($idParam)) {   
            $search = $pesquisarRepository->pesquisar($idParam);
            $Resultado['pesquisa'][0] = $search;
            if(count($Resultado)){
                $this->loadView("teste/search.php" . $Resultado);// já mandei pro cont principal 
            } else{
                echo "Evento não cadastrado";
            }  
           }     
          }
}