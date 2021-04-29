<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/inventario.php";

//Creamos el objeto Inventarios
$objConexion=Conectarse();
$objActivoT= new Inventarios();

$objActivoT->crearInventario2($_REQUEST["idinventario"],$_REQUEST["asignado"],$_REQUEST["nombre"],$_REQUEST["tipo"],$_REQUEST["marca"],
	$_REQUEST["modelo"],$_REQUEST["serial"],$_REQUEST["fabricante"],$_REQUEST["estado"],$_REQUEST["proveedor"],$_REQUEST["fechaIngreso"],
	$_REQUEST["fechaSalida"],$_REQUEST["seguimientos"]);

$resultado = $objActivoT->ActualizarInventario();

if ($resultado){

	header ("location:../Vista/listaInventario.php?&msj=3");
}
else{

	header ("location:../Vista/listaInventario.php?&msj=4");
}
?>