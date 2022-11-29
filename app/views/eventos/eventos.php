<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
</head>
<body>
    <h2>Cadastrar Evento</h2>
    <p/>
<form action="./EventosController.php?action=create" method="POST">
        <label for="idn"> Nome do Evento </label>
        <input type="text" name="nome" id="idn">
        <p/>
        <label for="idd">Data do evento </label>
        <input type="date" name="dia" id="idd">
        <p/>
        <label for="idhi">Horário de ínicio</label>
        <input type="time" name="inicio" id="idhi">
        <p/>
        <label for="idhf">Horário de término </label>
        <input type="time" name="final" id="idhf">
        <p/>
        <label for="idr"> Rua </label>
        <input type="text" name="rua" id="idr">
        <p/>
        <label for="idb">Bairro</label>
        <input type="text" name="bairro" id="idb">
        <p/>
        <label for="idnr">Número</label>
        <input type="text" name="numero" id="idnr">
        <p/>
        <label for="idc">CEP</label>
        <input type="text" name="cep" id="idc">
        <p/>
        <label for="idcd">Cidade do Evento</label>
        <input type="text" name="cidade" id="idcd">
        <p/>
        <label for="iddesc">Descrição do Evento </label>
        <input type="text" name="descricao" id="iddesc">
        <p/>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>