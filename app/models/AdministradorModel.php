<?php
class AdministradorModel
{

    private $id;
    private $nome;
    private $senha;
    private $email;

    public function getId(): int
    {

        return  $this->idAdministrador;
    }
    public function setId(int $id)
    {

        $this->idAdministrador = $id;
    }

    public function getNome(): string
    {

        return $this->nome_Adm;
    }

    public function setNome(string $nome)
    {

        $this->nome_Adm = $nome;
    }


    public function getSenha(): string
    {

        return $this->senha_Adm;
    }
    public function setSenha(string $senha)
    {

        $this->senha_Adm = $senha;
    }

    public function getEmail(): string
    {

        return $this->email_Adm;
    }
    public function setEmail(string $senha)
    {

        $this->email_Adm = $senha;
    }
}
