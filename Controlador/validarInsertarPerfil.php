<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Perfiles.php";

//Creamos el objeto Usuario
$objConexion=Conectarse();
$objPerfil= new Perfil();

$objPerfil->crearPerfil($_REQUEST["Login"],md5($_REQUEST["Password"]),$_REQUEST["Rol"],$_REQUEST["Estado"]);

$resultado = $objPerfil->agregarPerfil();

if ($resultado){


	header ("location:../Vista/listaPerfiles.php?&msj=1");
}
else{


	header ("location:../Vista/listaPerfiles.php?&msj=2");
}
?>
