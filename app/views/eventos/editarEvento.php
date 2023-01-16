<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Evento</title>
</head>

<body>
  <?php

  include_once __DIR__ . "/../helpers/mensagem.php";

  ?>

  <h2>Editar Evento</h2>

  <?php foreach ($data['eventos'] as $cd) : ?>
    <form action="./EventosController.php?action=update&id=<?= $cd->getId() ?>" method="POST" enctype="multipart/form-data">
      <label for="idn">Nome do Evento:</label>
      <input type="text" name="nome" id="idn" value="<?= $cd->getNome(); ?>">
      <p />
      <label for="idd">Data do event:</label>
      <input type="date" name="dia" id="idd" value="<?= $cd->getData(); ?>">
      <p />
      <label for="idhi">Horário de ínicio:</label>
      <input type="time" name="inicio" id="idhi" value="<?= $cd->getHorarioI(); ?>">
      <p />
      <label for="idhf">Horário de término:</label>
      <input type="time" name="final" id="idhf" value="<?= $cd->getHorarioF(); ?>">
      <p />
      <label for="idr">Rua:</label>
      <input type="text" name="rua" id="idr" value="<?= $cd->getNomeRua(); ?>">
      <p />
      <label for="idb">Bairro:</label>
      <input type="text" name="bairro" id="idb" value="<?= $cd->getBairro(); ?>">
      <p />
      <label for="idnr">Número:</label>
      <input type="text" name="numero" id="idnr" value="<?= $cd->getNumRua(); ?>">
      <p />
      <label for="idc">Cep:</label>
      <input type="text" name="cep" id="idc" value="<?= $cd->getCep(); ?>">
      <p />
      <label for="idcd">Cidade do Evento:</label>
      <input type="text" name="cidade" id="idcd" value="<?= $cd->getCidade(); ?>">
      <p />
      <label for="iddesc">Descrição do Evento:</label>
      <input type="text" name="descricao" id="iddesc" value="<?= $cd->getDescricao(); ?>">
      <p />
      <label for="idf">Banner evento </label>
      <input type="file" name="upload">
      <p />
      <button type="submit">Atualizar</button>
    </form>
  <?php endforeach; ?>
</body>

</html>