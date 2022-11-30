
function confirmarExclusãoEvento(nome, id) {

    var resposta = confirm("Deseja remover o registo'" + nome + "' ?");

    if (resposta) {

        window.location.href = "EventosController.php?action=deleteEventoById&id=" + id;

    }
}