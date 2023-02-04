function confirmarAdmExcluiEvento(nome, id) {

    var resposta = confirm("Deseja remover o evento'" + nome + "' ?");

    if (resposta) {

        window.location.href = "AdministradorController.php?action=AdmDeleteEventoById&id=" + id;

    }
}