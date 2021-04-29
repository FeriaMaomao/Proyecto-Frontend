<?php
session_start();
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Masivo_Inventario.xls');
	require('../Modelo/conexionBasesDatos.php');
	$objConexion = Conectarse();
	$query="SELECT * FROM activos_tecnologicos";
	$result=mysqli_query($objConexion, $query);
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