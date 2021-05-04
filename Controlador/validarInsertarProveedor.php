<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Proveedor.php";

//Creamos el objeto Proveedor
$objConexion=Conectarse();
$objUsuario= new Proveedor();

$objUsuario->crearProveedor($_REQUEST["Nit"],$_REQUEST["NombreProveedor"],$_REQUEST["DireccionProveedor"],$_REQUEST["TelefonoProveedor"]);

$resultado = $objUsuario->agregarProveedor();

if ($resultado){

	header ("location:../Vista/proveedor.php?&msj=1");
}
else{

	header ("location:../Vista/proveedor.php?&msj=2");
}
?>