<?php
session_start();
require "../Modelo/conexionBasesDatos.php";
//require "../Modelo/Usuario.php";
$objConexion=Conectarse();
$codigoeliminar=$_GET["parametro"];
$sql="delete from usuarios where usuarios.id_usuarios=$codigoeliminar";
$resultado = $objConexion->query($sql);

if ($resultado){
	header ("location:../Vista/listaUsuarios.php?&msj=5");
}
else{
	header ("location:../Vista/listaUsuarios.php?&msj=6");
}
?>