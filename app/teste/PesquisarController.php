<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "./PesquisarRepository.php";


$pesquisar = new ControllerPesquisar();


class ControllerPesquisar{


    function __construct(){

        if(isset($_POST["action"])){
           $action = $_POST["action"];  
       } elseif (isset($_GET["action"])){
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
               throw new BadFunctionCallException("Usecase not exists");
           }
   
       }
   
       public function loadView(string $path, array $data = null, string $msg = null){
   
           $caminho = __DIR__ . "/../views/" . $path;
           if(file_exists($caminho)){
                require $caminho;
           } else {
               $this->loadView("error/erro.php");
               echo ("<h2> Erro ao carregar a view<h2>");   
           }
   
       }

       private function loadForm(){ 

        $this->loadView("testePes/pesquisar.php");

    }

       private function search(){

         $pesquisarRepository = new PesquisarRepository();
         $data=[];
         if(isset($_GET['buscar'])){
           
            $buscar = $pesquisarRepository->search($_GET['buscar']);
            $data['resultado'] = $buscar;
           
         }
    
         $this->loadView("testePes/pesquisar.php");

       }
       

}

