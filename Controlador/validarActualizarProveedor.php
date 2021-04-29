<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Proveedor.php";

//Creamos el objeto Proveedor
$objConexion=Conectarse();
$objProveedor= new Proveedor();

$objProveedor->crearProveedor2($_REQUEST["idproveedor"],$_REQUEST["Nit"],$_REQUEST["NombreProveedor"],$_REQUEST["DireccionProveedor"],
	$_REQUEST["TelefonoProveedor"]);

$resultado = $objProveedor->ActualizarProveedor();

if ($resultado){

	header ("location:../Vista/listaProveedor.php?&msj=3");
}
else{

	header ("location:../Vista/listaProveedor.php?&msj=4");
}
?>