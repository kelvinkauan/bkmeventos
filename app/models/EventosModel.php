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






/**
 * Get the value of id
 */ 
public function getId():int{
return $this->idCadastrar;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId(int $id)
{
$this->idCadastrar = $id;

return $this;
}

/**
 * Get the value of nome
 */ 
public function getNome():string
{
return $this->nome_evento;
}

/**
 * Set the value of nome
 *
 * @return  self
 */ 
public function setNome(String $nome)
{
$this->nome_evento = $nome;

return $this;
}

/**
 * Get the value of data
 */ 
public function getData():IntlDateFormatter
{
return $this->data_evento;
}

/**
 * Set the value of data
 *
 * @return  self
 */ 
public function setData(IntlDateFormatter $data)
{
$this->data = $data;

return $this;
}

/**
 * Get the value of horarioI
 */ 
public function getHorarioI():DateTime
{
return $this->horarioI;
}

/**
 * Set the value of horarioI
 *
 * @return  self
 */ 
public function setHorarioI(Datetime $horarioI)
{
$this->horarioI = $horarioI;

return $this;
}

/**
 * Get the value of horarioF
 */ 
public function getHorarioF():time
{
return $this->horarioF;
}

/**
 * Set the value of horarioF
 *
 * @return  self
 */ 
public function setHorarioF($horarioF)
{
$this->horarioF = $horarioF;

return $this;
}

/**
 * Get the value of nomeRua
 */ 
public function getNomeRua():string
{
return $this->nomeRua;
}

/**
 * Set the value of nomeRua
 *
 * @return  self
 */ 
public function setNomeRua($nomeRua)
{
$this->nomeRua = $nomeRua;

return $this;
}

/**
 * Get the value of bairro
 */ 
public function getBairro():string
{
return $this->bairro;
}

/**
 * Set the value of bairro
 *
 * @return  self
 */ 
public function setBairro($bairro)
{
$this->bairro = $bairro;

return $this;
}

/**
 * Get the value of numRua
 */ 
public function getNumRua():string
{
return $this->numRua;
}

/**
 * Set the value of numRua
 *
 * @return  self
 */ 
public function setNumRua($numRua)
{
$this->numRua = $numRua;

return $this;
}

/**
 * Get the value of CEP
 */ 
public function getCEP():string
{
return $this->CEP;
}

/**
 * Set the value of CEP
 *
 * @return  self
 */ 
public function setCEP($CEP)
{
$this->CEP = $CEP;

return $this;
}

/**
 * Get the value of descricao
 */ 
public function getDescricao():string
{
return $this->descricao;
}

/**
 * Set the value of descricao
 *
 * @return  self
 */ 
public function setDescricao($descricao)
{
$this->descricao = $descricao;

return $this;
}
}

?>