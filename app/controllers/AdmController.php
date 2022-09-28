<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once __DIR__ . "./../repository/AdmRepository.php";

    $adm = new AdmController();

    class AdmController{

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





        private function create(){

        $adm = new AdmModel();

		$adm->setNome($_POST["nome"]);

        $adm->setSenha($_POST["senha"]);

        $admRepository = new AdmRepository();

        $id = $admRepository->create($adm);

        if($id){

			$msg = "Registro inserido com sucesso.";

		}else{

			$msg = "Erro ao inserir o registro no banco de dados.";

		}

        $this->findAll($msg);

       }



        private function loadForm(){ //loadFormNew

            $this->loadView("administrador/LoginAdministrador.php", null, "teste");

        }




        private function findAll(string $msg = null){

            $admRepository = new AdmRepository();

            $adm = $admRepository->findAll();

            $data['titulo'] = "listar administrador"; // ver sobre isso

            $data['administradores'] = $adm;

            $this->loadView("administrador/list.php", $data, $msg);

        }

        private function findAdminById(){

            $idParam = $_GET['id'];

            $admRepository = new AdmRepository();

            $adm = $admRepository->findAdminById($idParam);

            print "<pre>";

            print_r($adm);

            print "</pre>";

        }



       

        private function preventDefault() {

            print ("Ação indefinida...");

        }


}

?>