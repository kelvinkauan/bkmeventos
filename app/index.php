<?php

/* Redireciona o usúario para o controller principal dele no caso o CRUD (create,read,update,delete) //colocar no header?action=findAll */

//header("location: views/login/login.php");
//header("location: controllers/OrganizadorController.php?action=findAll");

header("location: controllers/LadingController.php?action=loadForm");

//header("location: controllers/AdministradorController.php?action=findAll");