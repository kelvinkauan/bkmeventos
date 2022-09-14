<?php
class AdmModel{
    private $id;
    private $nome;
    private $senha;

    public function getId() : int {

      return  $this-> idAministrador;
    }
    public function setId(int $id){ 

        $this-> idAdministrador = $id;
    }



    public function getNome() : string{

        return $this-> nome_Adm;
    }
    public function serNome(string $nome){

        $this-> nome_Adm = $nome;
    }


    

    public function getSenha():string {

        return $this->senha_Adm;
    }
    public function setSenha(string $senha){

        $this->senha_Adm = $senha;
    }


}

?>
