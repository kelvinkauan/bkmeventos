
function confirmarExclusaoOrganizador(nome, id) {

    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {

        window.location.href = "OrganizadorController.php?action=deleteOrganizadorById&id=" + id;

    }
}

function confirmarExclusaoAdministrador(nome, id) {

    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {

        window.location.href = "AdministradorController.php?action=deleteAdministradorById&id=" + id;

    }
}
