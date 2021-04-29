<?php
$objConexion=Conectarse();
//Consulta Datos Fabricante para mostrar en el registro de inventario
$sql="select idFabricante, NombreFabricante from fabricante";
$fabricante = $objConexion->query($sql);
//Consulta Datos Marca para mostrar en el registro de inventario
$sql="select idMarca, NombreMarca from marca";
$marca = $objConexion->query($sql);
//Consulta Datos Proveedor para mostrar en el registro de inventario
$sql="select id_Proveedor, Nombre from proveedor";
$proveedor = $objConexion->query($sql);
//Consulta Datos Hardware para mostrar en el registro de inventario
$sql="select idTipo_Hardware, NombreTipo from tipo_hardware";
$hardware = $objConexion->query($sql);
//Consulta Datos Usuarios para mostrar en el registro de inventario
$sql="select id_usuarios, Nombres, Apellidos from usuarios";
$usuarios = $objConexion->query($sql);
//Consulta distinta de nombre de activo
$sql="select distinct Nombre from activos_tecnologicos";
$nombreactivo = $objConexion->query($sql);
//Consulta distinta de modelo de activo
$sql="select distinct Modelo from activos_tecnologicos";
$modeloactivo = $objConexion->query($sql);
//Consulta distinta de serial de activo
$sql="select distinct Serial from activos_tecnologicos";
$serialactivo = $objConexion->query($sql);
//Consulta distinta de estado de activo
$sql="select distinct Estado from activos_tecnologicos";
$estadoactivo = $objConexion->query($sql);
?>