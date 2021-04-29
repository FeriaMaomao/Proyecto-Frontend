<?php
session_start();
require "../Modelo/conexionBasesDatos.php";
//require "../Modelo/Usuario.php";
$objConexion=Conectarse();
$codigoeliminar=$_GET["parametro"];
$sql="delete from perfil where perfil.Id=$codigoeliminar";
$resultado = $objConexion->query($sql);

if ($resultado){

	header ("location:../Vista/listaPerfiles.php?&msj=5");
}
else{

	header ("location:../Vista/listaPerfiles.php?&msj=6");
}
?>