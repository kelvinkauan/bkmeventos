<?php 

class EventosModel{
private $id;
private $nome;
private $data;
private $horarioI;
private $horarioF;
private $nomeRua;
private $bairro;
private $numRua;
private $CEP;
private $descricao;

/*<!-- getters e setters do id--> */

public function getId():int{

return $this->idCadastrar;

}

public function setId(int $id){

$this->idCadastrar = $id;

return $this;

}

/*<!-- getters e setters do nome --> */

public function getNome():string{

return $this->nome_evento;

}

public function setNome(String $nome){

$this->nome_evento = $nome;

return $this;

}

/*<!-- getters e setters da data --> */

public function getData(): string {

return $this-> data_evento;

}

public function setData(string $data){

$this-> data_evento = $data;

return $this;

}

/*<!-- getters e setters do horario inicial --> */

public function getHorarioI():string{

return $this->horaI_evento;

}

public function setHorarioI(string $horarioI){

$this->horaI_evento = $horarioI;

return $this;

}

/*<!-- getters e setters do hoaria final--> */

public function getHorarioF():string{

return $this->horaF_evento;

}

public function setHorarioF(string $horarioF){

$this->horaF_evento = $horarioF;

return $this;

}

/*<!-- getters e setters do nome da rua --> */

public function getNomeRua():string{

return $this->endereco_rua;

}

public function setNomeRua(String $nomeRua){

$this->endereco_rua = $nomeRua;

return $this;

}

/*<!-- getters e setters do bairro --> */

public function getBairro():string{

return $this->endereco_bairro;

}

public function setBairro(String $bairro){

$this->bendereco_bairro= $bairro;

return $this;

}

/*<!-- getters e setters da rua --> */

public function getNumRua():string{

return $this->endereco_num;

}

 function setNumRua($numRua){

$this->endereco_num = $numRua;

return $this;
}

/*<!-- getters e setters do cep --> */

public function getCEP():string{

return $this->cep_evento;

}

public function setCEP(string $CEP){

$this->cep_evento = $CEP;

return $this;

}

/*<!-- getters e setters da descrição --> */

public function getDescricao():string{

return $this->descricao_evento;

}

public function setDescricao(string $descricao){

$this->descricao_evento = $descricao;

return $this;

}

}

?>