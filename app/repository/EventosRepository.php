<?php

require_once __DIR__ . "./../connection/connection.php";
require_once __DIR__ . "./../models/EventosModel.php";

class EventosRepository
{

    public PDO $conn;
    function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function create(EventosModel $evento): int
    {

        try {

            $query = "INSERT INTO cadastrar_evento (nome_evento, data_evento, horaI_evento, horaF_evento, endereco_bairro, endereco_rua, endereco_num, cidade_evento, CEP_evento, descricao_evento,imagem_evento) VALUES (:nome,:dia, :inicio, :final, :bairro, :rua, :numero, :cidade, :cep, :descricao, :imagem) ";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":nome", $evento->getNome());
            $prepare->bindValue(":dia", $evento->getData());
            $prepare->bindValue(":inicio", $evento->getHorarioI());
            $prepare->bindValue(":final", $evento->getHorarioF());
            $prepare->bindValue(":bairro", $evento->getBairro());
            $prepare->bindValue(":rua", $evento->getNomeRua());
            $prepare->bindValue(":numero", $evento->getNumRua());
            $prepare->bindValue(":cidade", $evento->getCidade());
            $prepare->bindValue(":cep", $evento->getCEP());
            $prepare->bindValue(":descricao", $evento->getDescricao());
            $prepare->bindValue(":imagem", $evento->getImagem());

            $prepare->execute();

            return $this->conn->lastInsertId();
        } catch (Exception $e) {

            print("Erro ao inserir os dados do evento no banco de dados!");
        }
    }


    public function findAll(): array
    {

        $table = $this->conn->query("SELECT * FROM cadastrar_evento");
        $evento = $table->fetchAll(PDO::FETCH_ASSOC);
        return $evento;
    }

    public function findEventoById(int $id)
    {

        $query = "SELECT * FROM cadastrar_evento WHERE idCadastrar = ?";
        $prepare = $this->conn->prepare($query);
        $prepare->bindParam(1, $id, PDO::PARAM_INT);
        if ($prepare->execute()) {

            $evento = $prepare->fetchObject("EventosModel");
        } else {

            $evento = null;
        }

        return $evento;
    }

    public function update(EventosModel $evento): bool
    {

        $query = "UPDATE cadastrar_evento SET  nome_evento = :nome,  data_evento = :data_evento , horaI_evento = :inicio, horaF_evento = :final, endereco_bairro = :bairro, endereco_rua = :rua, endereco_num = :numero, cidade_evento = :cidade, cep_evento = :cep, descricao_evento = :descricao, imagem_evento = :imagem  WHERE idCadastrar = :id";
        $prepare = $this->conn->prepare($query);
        $prepare->bindValue("nome", $evento->getNome());
        $prepare->bindValue(":data_evento", $evento->getData());
        $prepare->bindValue(":inicio", $evento->getHorarioI());
        $prepare->bindValue(":final", $evento->getHorarioF());
        $prepare->bindValue(":bairro", $evento->getBairro());
        $prepare->bindValue(":rua", $evento->getNomeRua());
        $prepare->bindValue(":numero", $evento->getNumRua());
        $prepare->bindValue(":cidade", $evento->getCidade());
        $prepare->bindValue(":cep", $evento->getCEP());
        $prepare->bindValue(":descricao", $evento->getDescricao());
        $prepare->bindValue(":id", $evento->getId());
        $prepare->bindValue(":imagem", $evento->getImagem());
        $result = $prepare->execute();
        return $result;
    }

    public function deleteById(int $id): int
    {

        $query = "DELETE FROM cadastrar_evento WHERE idCadastrar = :id";
        $prepare = $this->conn->prepare($query);
        $prepare->bindValue(":id", $id);
        $prepare->execute();
        $result = $prepare->rowCount();
        return $result;
    }

    public function pesquisar(string $pesquisa): array
    {
        $pesquisa = "%$pesquisa%";
        $query = "SELECT * FROM cadastrar_evento WHERE nome_evento LIKE :nome";  // or %:nome%  
        $prepare = $this->conn->prepare($query);
        $prepare->bindParam(':nome', $pesquisa, PDO::PARAM_STR); //PDO::PARAM_STR
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
