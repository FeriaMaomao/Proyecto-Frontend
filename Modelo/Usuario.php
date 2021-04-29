<?php

class Usuario
{
	private $idusuario;
	private $Nombres;
	private $Apellidos;
	private $Cedula;
	private $Cargo;
	private $Area;
	private $Correo;
	private $Conexion;

	public function setIdUsuario($idusuario)
	{
		$this->idusuario=$idusuario;
	}

	public function getIdUsuario()
	{
		return ($this->idusuario);
	}

	public function setNombres($Nombres)
	{
		$this->Nombres=$Nombres;
	}

	public function getNombres()
	{
		return ($this->Nombres);
	}

	public function setApellidos($Apellidos)
	{
		$this->Apellidos=$Apellidos;
	}

	public function getApellidos()
	{
		return ($this->Apellidos);
	}

	public function setCedula($Cedula)
	{
		$this->Cedula=$Cedula;
	}

	public function getCedula()
	{
		return ($this->Cedula);
	}

	public function setCargo($Cargo)
	{
		$this->Cargo=$Cargo;
	}

	public function getCargo()
	{
		return ($this->Cargo);
	}

	public function setArea($Area)
	{
		$this->Area=$Area;
	}

	public function getArea()
	{
		return ($this->Area);
	}

	public function setCorreo($Correo)
	{
		$this->Correo=$Correo;
	}

	public function getCorreo()
	{
		return ($this->Correo);
	}


	public function crearUsuario($Nombres,$Apellidos,$Cedula,$Cargo,$Area,$Correo)
	{
		$this->Nombres=$Nombres;
		$this->Apellidos=$Apellidos;
		$this->Cedula=$Cedula;
		$this->Cargo=$Cargo;
		$this->Area=$Area;
		$this->Correo=$Correo;
		$this->Conexion=$Conexion;
	}
		//Funcion para capturar datos del actualizar usuario
		public function crearUsuario2($idusuario,$Nombres,$Apellidos,$Cedula,$Cargo,$Area,$Correo)
	{
		$this->idusuario=$idusuario;
		$this->Nombres=$Nombres;
		$this->Apellidos=$Apellidos;
		$this->Cedula=$Cedula;
		$this->Cargo=$Cargo;
		$this->Area=$Area;
		$this->Correo=$Correo;
		$this->Conexion=$Conexion;
	}

	public function agregarUsuario()
	{
		$this->Conexion=Conectarse();
		$sql="insert into usuarios(Nombres,Apellidos,Cedula,Cargo,Area,Correo)
values ('$this->Nombres','$this->Apellidos','$this->Cedula','$this->Cargo','$this->Area',
'$this->Correo')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarUsuarios()
	{
		$this->Conexion=Conectarse();
		$sql="select * from usuarios";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarUsuario($idusuario)
	{
		$this->Conexion=Conectarse();
		$sql="select * from usuarios where id_usuarios='$idusuario'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function ActualizarUsuario()
	{
		$this->Conexion=Conectarse();
		$sql="update usuarios set id_usuarios='$this->idusuario',Nombres='$this->Nombres',
		Apellidos='$this->Apellidos',Cedula='$this->Cedula',Cargo='$this->Cargo',Area='$this->Area',
		Correo='$this->Correo' where usuarios.id_usuarios = '$this->idusuario'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}
}

?>
