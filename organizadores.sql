use projeto_integrador;

#create table organizadores(
#idOrganizador int not null auto_increment primary key ,
#nc_Organizador varchar(60),
#email_Organizador varchar (60),
#senha_Organizador varchar(12)
#);

 #create table administradores(
 #idAdministrador int not null auto_increment primary key,
 #nome_Adm varchar(10),
 #senha_Adm varchar(10),
 #);

alter table administradores change senhaAdm senha_Adm varchar(10) ;
desc administradores;