<?php
session_start();
require "../Modelo/conexionBasesDatos.php";
//require "../Modelo/Usuario.php";
$objConexion=Conectarse();
$codinventario=$_GET["parametro"];
$sql="delete from activos_tecnologicos where activos_tecnologicos.id_inventario=$codinventario";
$resultado = $objConexion->query($sql);

if ($resultado){
	header ("location:../Vista/listaInventario.php?&msj=5");
}
else{
	header ("location:../Vista/listaInventario.php?&msj=6");
}
?>