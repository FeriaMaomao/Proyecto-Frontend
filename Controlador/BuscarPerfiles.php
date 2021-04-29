<?php
   session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

$mysqli = new mysqli("localhost","admin","1234567890","andromedadb");
	
    $salida = "";

    $query = "SELECT * FROM perfil";

    if (isset($_POST['consulta'])) {
    	$q = $mysqli->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM perfil WHERE ID LIKE '%".$q."%' OR Login LIKE '%".$q."%' OR Estado LIKE '%".$q."%' OR Rol LIKE '%".$q."%' ";
    }

    $resultado = $mysqli->query($query);

 if ($resultado->num_rows>0) { 
$salida.="<table class='table table-striped'>
    <thead>
      <tr>
        <th>ID Perfil</th>
        <th>Login</th>
        <th>Rol</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody>";


while ($fila = $resultado->fetch_assoc()) { 

$salida.="<tr>
        <td>".$fila['ID']."</td>
        <td>".$fila['Login']."</td>
        <td>".$fila['Rol']."</td>
        <td>".$fila['Estado']."</td> ";
        if($_SESSION['rol']==1) {
       $salida.= "<td><button title='Eliminar' type='button' name='eliminar' class='btn btn-primary' onclick='EliminarPerfil(".$fila['ID'].")'><span class='icon-remove-user'></span></button></td>
        <td><button title='Actualizar' type='button' name='actualizar' class='btn btn-primary' onclick='ModificarPerfil(".$fila['ID'].")'><span class='icon-shuffle'></span></button></td>
        </tr>"; }
    

}
$salida.= "</tbody></table>";
} else
  {
      $salida.="<h3 style='color:red' >NO HAY DATOS</h3>";
    }
    echo $salida;

    $mysqli->close();

?>