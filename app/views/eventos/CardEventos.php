<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Event Details</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      .event-container {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
      }
      .event-header {
        background-color: #f2f2f2;
        padding: 20px;
      }
      .event-details {
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
      }
      .event-image {
        width: 100%;
        height: auto;
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="event-container">
      <div class="event-header">
        kkkk
      </div>
      <div class="event-details">
        <ul>
      
      <?php $cd = $data['dados_evento'] ?>
          <li><?= $cd['nome_evento'] ?></li>
          <li><?= $cd['data_evento'] ?></li>
          <li><?= $cd['horaI_evento'] ?></li>
          <li><?= $cd['horaF_evento'] ?></li>
          <li><?= $cd['endereco_num'] ?></li>
          <li><?= $cd['endereco_bairro'] ?></li>
          <li><?= $cd['endereco_rua'] ?></li>
          <li><?= $cd['cidade_evento'] ?></li>
          <li><?= $cd['CEP_evento'] ?></li>
          <li><?= $cd['descricao_evento'] ?></li>
          <li><?= $cd['imagem_evento'] ?></li>
          
        </ul>
     </form>
    </div>
  </body>
</html>
