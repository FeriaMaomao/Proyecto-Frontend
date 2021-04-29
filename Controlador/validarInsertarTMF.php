<?php
session_start();
extract ($_REQUEST);
require "../Modelo/conexionBasesDatos.php";
$objConexion=Conectarse();

$Tipo_Activo=$_POST["Tipo_Activo"];
$Marca_Activo=$_POST["Marca_Activo"];
$Fabricante_Activo=$_POST["Fabricante_Activo"];

if (isset($_REQUEST["BtnTipo"])){
    $sql="insert into tipo_hardware(NombreTipo) values('$Tipo_Activo')";
    $resultado = $objConexion->query($sql);
    header ("location:../Vista/RegistrarTMF.php?&msj=1");
}

else if (isset($_REQUEST["BtnMarca"])){
    $sql="insert into marca(NombreMarca) values('$Marca_Activo')";
    $resultado = $objConexion->query($sql);
    header ("location:../Vista/RegistrarTMF.php?&msj=2");
}

else if (isset($_REQUEST["BtnFabricante"])){
    $sql="insert into fabricante(NombreFabricante) values('$Fabricante_Activo')";
    $resultado = $objConexion->query($sql);
    header ("location:../Vista/RegistrarTMF.php?&msj=3");
}

else{

	header ("location:../Vista/RegistrarTMF.php?&msj=4");
}

?>