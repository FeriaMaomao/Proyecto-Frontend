<?php

class Perfil
{
	private $idperfil;
	private $Login;
	private $Password;
	private $Rol;
	private $Estado;
	private $Conexion;

	public function setIdPerfil($idperfil)
	{
		$this->idperfil=$idperfil;
	}

	public function getIdPerfil()
	{
		return ($this->idperfil);
	}

	public function setLogin($Login)
	{
		$this->Login=$Login;
	}

	public function getLogin()
	{
		return ($this->Login);
	}

	public function setPassword($Password)
	{
		$this->Password=$Password;
	}

	public function getPassword()
	{
		return ($this->Password);
	}

	public function setRol($Rol)
	{
		$this->Rol=$Rol;
	}

	public function getRol()
	{
		return ($this->Rol);
	}

	public function setEstado($Estado)
	{
		$this->Estado=$Estado;
	}

	public function getEstado()
	{
		return ($this->Estado);
	}


	public function crearPerfil($Login,$Password,$Rol,$Estado)
	{
		$this->Login=$Login;
		$this->Password=$Password;
		$this->Rol=$Rol;
		$this->Estado=$Estado;
		$this->Conexion=$Conexion;
	}
		//Funcion para capturar datos del actualizar usuario
		public function crearPerfil2($idperfil,$Login,$Password,$Rol,$Estado)
	{
		$this->idperfil=$idperfil;
		$this->Login=$Login;
		$this->Password=$Password;
		$this->Rol=$Rol;
		$this->Estado=$Estado;
		$this->Conexion=$Conexion;
	}

	public function agregarPerfil()
	{
		$this->Conexion=Conectarse();
		$sql="insert into perfil(Login,Password,Rol,Estado)
values ('$this->Login','$this->Password','$this->Rol','$this->Estado')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarPerfiles()
	{
		$this->Conexion=Conectarse();
		$sql="select * from perfil";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarUsuario($idperfil)
	{
		$this->Conexion=Conectarse();
		$sql="select * from perfil where Id='$idperfil'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function ActualizarPerfil()
	{
		$this->Conexion=Conectarse();
		$sql="update perfil set Id='$this->idperfil',Login='$this->Login',
		Password='$this->Password',Rol='$this->Rol',Estado='$this->Estado' where perfil.Id = '$this->idperfil'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}
}

?>