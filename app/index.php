<?php

/* Redireciona o usúario para o controller principal dele no caso o CRUD (create,read,update,delete) //colocar no header?action=findAll */

header("location: controllers/OrganizadorController.php?action=findAll");

//header("location: controllers/AdmController.php?action=findALL");