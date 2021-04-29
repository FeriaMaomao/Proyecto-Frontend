<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/inventario.php";

//Creamos el objeto Inventarios
$objConexion=Conectarse();
$objUsuario= new Inventarios();

$objUsuario->crearInventario($_REQUEST["asignado"],$_REQUEST["nombre"],$_REQUEST["tipo"],$_REQUEST["marca"],$_REQUEST["modelo"],
	$_REQUEST["serial"],$_REQUEST["fabricante"],$_REQUEST["estado"],$_REQUEST["proveedor"],$_REQUEST["fechaIngreso"],
	$_REQUEST["fechaSalida"],$_REQUEST["seguimientos"]);

$resultado = $objUsuario->agregarInventario();

if ($resultado){

	header ("location:../Vista/listaInventario.php?&msj=1");
}
else{

	header ("location:../Vista/listaInventario.php?&msj=2");
}
?>