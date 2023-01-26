function confirmarAdmExcluiOrg(nome, id) {

    var resposta = confirm("Deseja remover o registro '" + nome + "' ?");

    if (resposta) {

        window.location.href = "AdministradorController.php?action=AdmDeleteOrganizadorById&id=" + id;

    }
}