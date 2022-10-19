<?php

class OrganizadorModel{

private $id;
private $nome;
private $email;
private $senha;

/*<!-- getters e setters do email--> */ 

public function getId(): int{ // esse "int" indica que vai retornar um int

return $this-> idOrganizador;

}
 
public function setId(int $id){

$this->idOrganizador = $id;
//return $this;

}

/*<!-- getters e setters do nome --> */

public function getNome(): string{
    
return $this->nc_Organizador;

}

public function setNome(string $nome){

$this->nc_Organizador = $nome;

//return $this;

}

/*<!-- getters e setters do email--> */

public function getEmail(): string{

return $this->email_Organizador;

}

public function setEmail(string $email){

$this->email_Organizador= $email;

//return $this;

}

/*<!-- getters e setters da senha --> */

public function getSenha(): string{

return $this->senha_Organizador;

}

public function setSenha(string $senha){

$this->senha_Organizador = $senha; //sha1($senha)

//return $this;

}

}

?>