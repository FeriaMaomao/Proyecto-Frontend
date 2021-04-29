<?php
session_start();
$where="";
$asignado=$_POST["asignado"];
$estado=$_POST["estado"];
$ingresosalida=$_POST["ingresosalida"];
$desde=$_POST["desde"];
$hasta=$_POST["hasta"];

// NOMBRE DEL ARCHIVO Y CHARSET
	header("Content-Type:application/xls");
	header("Content-Disposition: attachment; filename=Reporte_Activos.xls");

	require('../Modelo/conexionBasesDatos.php');
	$ObjConexion=Conectarse();

if(isset($_POST['generar_reporte']))
{
	if (empty($_POST['asignado']))
	{
		$where="where Estado='$estado' and $ingresosalida between '$desde' and '$hasta'";
	}

	else if (empty($_POST['estado']))
	{
		$where="where Asignado='$asignado' and $ingresosalida between '$desde' and '$hasta'";
	}

	else if (empty($_POST['ingresosalida']))
	{
		$where="where Asignado='$asignado' and Estado='$estado'";
	}
	
	else if (empty($_POST['asignado']) || empty($_POST['ingresosalida']))
	{
		$where="where Estado='$estado'";
	}

	else
	{
		$where="where Asignado='$asignado' and Estado='$estado' and $ingresosalida between '$desde' and '$hasta'";
	}

	// SALIDA DEL ARCHIVO
	$query="SELECT * FROM activos_tecnologicos $where";
	$result=mysqli_query($ObjConexion, $query);

    //ANCABEZADO DE REPORTES
?>

<table border="1">
	<tr>
		<th style="background-color:#3a6ccf;">ID Inventario</th>
        <th style="background-color:#3a6ccf;">Asignado</th>
        <th style="background-color:#3a6ccf;">Nombre</th>
        <th style="background-color:#3a6ccf;">Tipo</th>
        <th style="background-color:#3a6ccf;">Marca</th>
        <th style="background-color:#3a6ccf;">Modelo</th>
        <th style="background-color:#3a6ccf;">Serial</th>
        <th style="background-color:#3a6ccf;">Fabricante</th>
        <th style="background-color:#3a6ccf;">Estado</th>
        <th style="background-color:#3a6ccf;">Proveedor</th>
        <th style="background-color:#3a6ccf;">Fecha Entrada</th>
        <th style="background-color:#3a6ccf;">Fecha Salida</th>
      </tr>
	<?php

	//Celdas para mostrar Reporte
		while ($row=mysqli_fetch_assoc($result)) {
			?>
	  <tr>
        <td><?php echo $row["id_inventario"] ?></td>
        <td><?php echo $row["Asignado"]?></td>
        <td><?php echo $row["Nombre"]?></td>
        <td><?php echo $row["Tipo"]?></td>
        <td><?php echo $row["Marca"]?></td>
        <td><?php echo $row["Modelo"]?></td>
        <td><?php echo $row["Serial"]?></td>
        <td><?php echo $row["Fabricante"]?></td>
        <td><?php echo $row["Estado"]?></td>
        <td><?php echo $row["invproveedor"]?></td>
        <td><?php echo $row["Fecha_Ingreso"]?></td>
        <td><?php echo $row["Fecha_Salida"]?></td>
      </tr>

			<?php
		}
	?>
</table>
<?php } ?>
