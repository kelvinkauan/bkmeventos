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
<form action="./EventosController.php?action=create" method="POST"   enctype="multipart/form-data">
        <label for="idn">Nome do Evento:</label>
        <input type="text" name="nome" id="idn" required>
        <p/>
        <label for="idd">Data do evento:</label>
        <input type="date" name="dia" id="idd" required>
        <p/>
        <label for="idhi">Horário de ínicio:</label>
        <input type="time" name="inicio" id="idhi" required>
        <p/>
        <label for="idhf">Horário de término:</label>
        <input type="time" name="final" id="idhf" required>
        <p/>
        <label for="idr">Rua:</label>
        <input type="text" name="rua" id="idr" required> 
        <p/>
        <label for="idb">Bairro:</label>
        <input type="text" name="bairro" id="idb"required>
        <p/>
        <label for="idnr">Número:</label>
        <input type="text" name="numero" id="idnr" required>
        <p/>
        <label for="idc">cep:</label>
        <input type="text" name="cep" id="idc" required>
        <p/>
        <label for="idcd">Cidade do Evento:</label>
        <input type="text" name="cidade" id="idcd" required>
        <p/>
        <label for="iddesc">Descrição do Evento:</label>
        <input type="text" name="descricao" id="iddesc" required>
        <p/>
       

        <div class="select-box">
               <label for="idin">tipo de Ingresso - O evento é pago?</label>
               <select name="ingresso" id="idin">
                  <option value="">Escolha o tipo ingresso</option>
                  <option value="Sim" id="ids"> Sim </option>
                  <option value="Não" id="idn"> Não </option>
               </select>
            </div>
                    

            <fieldset>
               <!--legend>Coloque URL dos ingressos abaixo !</legend>-->
               <div class="input-box">

                  <input type="url" name="ingresso" id="idi" placeholder="Coloque aqui a URL do ingresso" required  >
               </div>
            </fieldset>
        


            
        <label for="idf">Banner evento </label>
        <input type="file" name="upload">
        <p/>
        <input type="submit" value="Cadastrar">
    </form>

    <script type="text/javascript">
                        function MostrarUrl(){
                             var value = this.value;
                            console.log(this.value);
                            var input =  document.getElementById("idi");
                            if(value == "Não"){
                              
                                input.style.display = 'none';
                            }else if(value == "Sim"){
                                input.style.display = ' block ';
                            }


                        }
                       var ol = document.getElementById("idin");
                       ol.addEventListener("change", MostrarUrl);
                         
                          
                    </script>
</body>
</html>