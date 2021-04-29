<?php
session_start();
require "../Modelo/conexionBasesDatos.php";
//require "../Modelo/Usuario.php";
$objConexion=Conectarse();
$codproveedor=$_GET["parametro"];
$sql="delete from proveedor where proveedor.id_Proveedor=$codproveedor";
$resultado = $objConexion->query($sql);

if ($resultado){
	header ("location:../Vista/listaProveedores.php?&msj=5");
}
else{
    header ("location:../Vista/listaProveedores.php?&msj=6");
}
?>