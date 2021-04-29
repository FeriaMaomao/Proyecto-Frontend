<?php
class Proveedor
{
	private $idproveedor;
	private $Nit;
	private $NombreProveedor;
	private $DireccionProveedor;
	private $TelefonoProveedor;
	private $Conexion;

	public function setIdproveedor($idproveedor)
	{
		$this->idproveedor=$idproveedor;
	}

	public function getIdproveedor()
	{
		return ($this->idproveedor);
	}

	public function setNit($Nit)
	{
		$this->Nit=$Nit;
	}

	public function getNit()
	{
		return ($this->Nit);
	}

	public function setNombreProveedor($NombreProveedor)
	{
		$this->NombreProveedor=$NombreProveedor;
	}

	public function getNombreProveedor()
	{
		return ($this->NombreProveedor);
	}

	public function setDireccionProveedor($DireccionProveedor)
	{
		$this->DireccionProveedor=$DireccionProveedor;
	}

	public function getDireccionProveedor()
	{
		return ($this->DireccionProveedor);
	}

	public function setTelefonoProveedor($TelefonoProveedor)
	{
		$this->TelefonoProveedor=$TelefonoProveedor;
	}

	public function getTelefonoProveedor()
	{
		return ($this->TelefonoProveedor);
	}


	public function crearProveedor($Nit,$NombreProveedor,$DireccionProveedor,$TelefonoProveedor)
	{
		$this->Nit=$Nit;
		$this->NombreProveedor=$NombreProveedor;
		$this->DireccionProveedor=$DireccionProveedor;
		$this->TelefonoProveedor=$TelefonoProveedor;
	}

		//Funcion para capturar datos de actualizar proveedor
		public function crearProveedor2($idproveedor,$Nit,$NombreProveedor,$DireccionProveedor,
			$TelefonoProveedor)
	{
		$this->idproveedor=$idproveedor;
		$this->Nit=$Nit;
		$this->NombreProveedor=$NombreProveedor;
		$this->DireccionProveedor=$DireccionProveedor;
		$this->TelefonoProveedor=$TelefonoProveedor;
	}

	public function agregarProveedor()
	{
		$this->Conexion=Conectarse();
		$sql="insert into proveedor(NIT,Nombre,Direccion,Telefono)
values ('$this->Nit','$this->NombreProveedor','$this->DireccionProveedor','$this->TelefonoProveedor')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarProveedores()
	{
		$this->Conexion=Conectarse();
		$sql="select * from proveedor";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarProveedor($identificacion)
	{
		$this->Conexion=Conectarse();
		$sql="select * from proveedor where id_Proveedor='$idproveedor'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function ActualizarProveedor()
	{
		$this->Conexion=Conectarse();
		$sql="update proveedor set id_Proveedor='$this->idproveedor',NIT='$this->Nit',Nombre='$this->NombreProveedor',
		Direccion='$this->DireccionProveedor',Telefono='$this->TelefonoProveedor' where id_Proveedor='$this->idproveedor'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}
}

?>