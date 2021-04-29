<?php
class Inventarios
{
	private $idinventario;
	private $asignado;
	private $nombre;
	private $tipo;
	private $marca;
	private $modelo;
	private $serial;
	private $fabricante;
	private $estado;
	private $proveedor;
	private $fechaIngreso;
	private $fechaSalida;
	private $seguimientos;
	private $Conexion;

	public function setIdinventario($idinventario)
	{
		$this->idinventario=$idinventario;
	}

	public function getIdinventario()
	{
		return ($this->idinventario);
	}

	public function setAsignado($asignado)
	{
		$this->asignado=$asignado;
	}

	public function getAsignado()
	{
		return ($this->asignado);
	}

	public function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}

	public function getNombre()
	{
		return ($this->nombre);
	}

	public function setTipo($tipo)
	{
		$this->tipo=$tipo;
	}

	public function getTipo()
	{
		return ($this->tipo);
	}

	public function setMarca($marca)
	{
		$this->marca=$marca;
	}

	public function getMarca()
	{
		return ($this->marca);
	}

	public function setModelo($modelo)
	{
		$this->modelo=$modelo;
	}

	public function getModelo()
	{
		return ($this->modelo);
	}

	public function setSerial($serial)
	{
		$this->serial=$serial;
	}

	public function getSerial()
	{
		return ($this->serial);
	}

	public function setFabricante($fabricante)
	{
		$this->fabricante=$fabricante;
	}

	public function getFabricante()
	{
		return ($this->fabricante);
	}

	public function setEstado($estado)
	{
		$this->estado=$estado;
	}

	public function getEstado()
	{
		return ($this->estado);
	}

	public function setProveedor($proveedor)
	{
		$this->proveedor=$proveedor;
	}

	public function getProveedor()
	{
		return ($this->proveedor);
	}

	public function setFechaIngreso($fechaIngreso)
	{
		$this->fechaIngreso=$fechaIngreso;
	}

	public function getFechaIngreso()
	{
		return ($this->fechaIngreso);
	}

	public function setFechaSalida($fechaSalida)
	{
		$this->fechaSalida=$fechaSalida;
	}

	public function getFechaSalida()
	{
		return ($this->fechaSalida);
	}

	public function setSeguimientos($seguimientos)
	{
		$this->seguimientos=$seguimientos;
	}

	public function getSeguimientos()
	{
		return ($this->seguimientos);
	}

	public function crearInventario($asignado,$nombre,$tipo,$marca,$modelo,$serial,$fabricante,$estado,$proveedor,$fechaIngreso,$fechaSalida,$seguimientos)
	{
		$this->asignado=$asignado;
		$this->nombre=$nombre;
		$this->tipo=$tipo;
		$this->marca=$marca;
		$this->modelo=$modelo;
		$this->serial=$serial;
		$this->fabricante=$fabricante;
		$this->estado=$estado;
		$this->proveedor=$proveedor;
		$this->fechaIngreso=$fechaIngreso;
		$this->fechaSalida=$fechaSalida;
		$this->seguimientos=$seguimientos;
	}

	//Funcion para capturar datos de actualizar inventario
	public function crearInventario2($idinventario,$asignado,$nombre,$tipo,$marca,$modelo,$serial,$fabricante,$estado,$proveedor,$fechaIngreso,$fechaSalida,$seguimientos)
	{
		$this->idinventario=$idinventario;
		$this->asignado=$asignado;
		$this->nombre=$nombre;
		$this->tipo=$tipo;
		$this->marca=$marca;
		$this->modelo=$modelo;
		$this->serial=$serial;
		$this->fabricante=$fabricante;
		$this->estado=$estado;
		$this->proveedor=$proveedor;
		$this->fechaIngreso=$fechaIngreso;
		$this->fechaSalida=$fechaSalida;
		$this->seguimientos=$seguimientos;
	}

	public function agregarInventario()
	{
		$this->Conexion=Conectarse();
		$sql="insert into activos_tecnologicos(Asignado,Nombre,Tipo,Marca,Modelo,Serial,Fabricante,Estado,
		invproveedor,Fecha_Ingreso,Fecha_Salida,Seguimientos) values ('$this->asignado','$this->nombre',
		'$this->tipo','$this->marca','$this->modelo','$this->serial','$this->fabricante','$this->estado',
		'$this->proveedor','$this->fechaIngreso','$this->fechaSalida','$this->seguimientos')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarInventarios()
	{
		$this->Conexion=Conectarse();
		$sql="select * from activos_tecnologicos";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function consultarInventario($idinventario)
	{
		$this->Conexion=Conectarse();
		$sql="select * from activos_tecnologicos where id_inventario='$idinventario'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}

	public function ActualizarInventario()
	{
		$this->Conexion=Conectarse();
		$sql="update activos_tecnologicos set id_inventario='$this->idinventario',Asignado='$this->asignado',Nombre='$this->nombre',
		Tipo='$this->tipo',Marca='$this->marca',Modelo='$this->modelo',Serial='$this->serial',Fabricante='$this->fabricante',
		Estado='$this->estado',invproveedor='$this->proveedor',Fecha_Ingreso='$this->fechaIngreso',Fecha_Salida='$this->fechaSalida',
		Seguimientos='$this->seguimientos' where id_inventario='$this->idinventario'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;
	}
}

?>