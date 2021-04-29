<?php


function Conectarse()
{
	$objConexion = new mysqli("localhost","admin","1234567890","andromedadb");
	if ($objConexion->connect_errno)
	{
		echo "Erro de conexion a la Base de Datos ".$objConexion->connect_error;
		exit();
	}
	else
	{
		return $objConexion;
	}
}

?>