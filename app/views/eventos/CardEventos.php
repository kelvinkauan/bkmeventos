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
        informações do evento
      </div>
      <div class="event-details">
        <ul>
      
      <?php $cd = $data['dados_evento'] ?>
          <li><?= $cd['nome_evento'] ?></li>
          <br>
          <li><?= $cd['data_evento'] ?></li>
          <br>
          <li><?= $cd['horaI_evento'] ?></li>
          <br>
          <li><?= $cd['horaF_evento'] ?></li>
          <br>
          <li><?= $cd['endereco_num'] ?></li>
          <br>
          <li><?= $cd['endereco_bairro'] ?></li>
          <br>
          <li><?= $cd['endereco_rua'] ?></li>
          <br>
          <li><?= $cd['cidade_evento'] ?></li>
          <br>
          <li><?= $cd['CEP_evento'] ?></li>
          <br>
          <li><?= $cd['descricao_evento'] ?></li>
          <br>
          
          <?php 
              if($cd['ingresso'] == ""){
                  echo "Evento Gratuíto";
              }else{
                echo $cd['ingresso'];
              }
          ?>
                 <br>
          <img src="/bkmeventos/app/upload/<?= $cd['imagem_evento'] ?>" alt="Imagem do evento!">
          
        </ul>
     </form>
    </div>
  </body>
</html>
