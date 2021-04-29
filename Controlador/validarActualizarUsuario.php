<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Usuario.php";

//Creamos el objeto Usuario
$objConexion=Conectarse();
$objUsuario= new Usuario();

$objUsuario->crearUsuario2($_REQUEST["idusuario"],$_REQUEST["Nombres"],$_REQUEST["Apellidos"],$_REQUEST["Cedula"],$_REQUEST["Cargo"],
$_REQUEST["Area"],$_REQUEST["Correo"],$_REQUEST["Contraseña"]);

$resultado = $objUsuario->ActualizarUsuario();
if ($resultado)
	header ("location:../Vista/listaUsuarios.php?&msj=3");
else
	header ("location:../Vista/listaUsuarios.php?&msj=4");
?>
