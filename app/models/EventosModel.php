<?php

class EventosModel
{

    private $id;
    private $nome;
    private $data;
    private $horarioI;
    private $horarioF;
    private $nomeRua;
    private $bairro;
    private $cidade;
    private $numRua;
    private $CEP;
    private $descricao;
    private $imagem;

    /*<!-- getters e setters do id--> */

    public function getId(): int
    {

        return $this->idCadastrar;
    }

    public function setId(int $id)
    {

        $this->idCadastrar = $id;

        return $this;
    }

    /*<!-- getters e setters do nome --> */

    public function getNome(): string
    {

        return $this->nome_evento;
    }

    public function setNome(string $nome)
    {

        $this->nome_evento = $nome;

        return $this;
    }

    /*<!-- getters e setters da data --> */

    public function getData(): string
    {

        return $this->data_evento;
    }

    public function setData(string $data)
    {

        $this->data_evento = $data;

        return $this;
    }

    /*<!-- getters e setters do horario inicial --> */

    public function getHorarioI(): string
    {

        return $this->horaI_evento;
    }

    public function setHorarioI(string $horarioI)
    {

        $this->horaI_evento = $horarioI;

        return $this;
    }

    /*<!-- getters e setters do hoaria final--> */

    public function getHorarioF(): string
    {

        return $this->horaF_evento;
    }

    public function setHorarioF(string $horarioF)
    {

        $this->horaF_evento = $horarioF;

        return $this;
    }

    /*<!-- getters e setters do nome da rua --> */

    public function getNomeRua(): string
    {

        return $this->endereco_rua;
    }

    public function setNomeRua(string $nomeRua)
    {

        $this->endereco_rua = $nomeRua;

        return $this;
    }

    /*<!-- getters e setters do bairro --> */

    public function getBairro(): string
    {

        return $this->endereco_bairro;
    }

    public function setBairro(string $bairro)
    {

        $this->endereco_bairro = $bairro;

        return $this;
    }

    /*<!-- getters e setters da rua --> */

    public function getNumRua(): string
    {

        return $this->endereco_num;
    }

    function setNumRua(string $numRua)
    {

        $this->endereco_num = $numRua;

        return $this;
    }

    /*<!-- getters e setters do cep --> */

    public function getCEP(): string
    {

        return $this->cep_evento;
    }

    public function setCEP(string $CEP)
    {

        $this->cep_evento = $CEP;

        return $this;
    }

    /*<!-- getters e setters da descrição --> */

    public function getDescricao(): string
    {

        return $this->descricao_evento;
    }

    public function setDescricao(string $descricao)
    {

        $this->descricao_evento = $descricao;

        return $this;
    }

    /*<!-- getters e setters da cidade --> */

    public function getCidade(): string
    {

        return $this->cidade_evento;
    }

    public function setCidade(string $cidade)
    {

        $this->cidade_evento = $cidade;

        return $this;
    }

    /*<!-- getters e setters da imagens --> */



    /**
     * Get the value of imagem
     */
    public function getImagem(): string
    {
        return $this->imagem_evento;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */
    public function setImagem(array $imagem)
    {

        $error = $imagem['error'];
        $uploads_dir = realpath(__DIR__ . '/../upload');
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $imagem["tmp_name"];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = uniqid() . basename($imagem["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
        }
        $this->imagem_evento = $name;

        return $this;
    }
}
