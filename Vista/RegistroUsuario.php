<?php
  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user'])){
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
}
else{
  if($_SESSION['rol'] !=1){
    header("location:../Vista/listaUsuarios.php");
  }
}
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Usuario.php";
$objDatos=new Usuario();
$registro=$objDatos->consultarUsuarios();

if(!isset($_REQUEST['msj'])){
    $msj=0;
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <title>Registro de Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link href="../CSS/Usuario.css" rel="stylesheet">
    <script>

function Cambiar(codusuario)
{
  window.location="../Vista/ModificarUsuario.php?parametro="+codusuario;
}

function EliminarUsuario(codigoeliminar)
{
  window.location="../Controlador/validarEliminarUsuario.php?parametro="+codigoeliminar;
}

</script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="nosotros.html"><img src="../Imagenes/logo andromeda.PNG"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="usuarios.html">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="" tabindex="-1" aria-disabled="true">Inventario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="proveedor.html" tabindex="-1" aria-disabled="true">Proveedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="Perfiles.html" tabindex="-1" aria-disabled="true">Perfiles</a>
        <li class="nav-item">
          <a class="nav-link active" href="Reportes.html" tabindex="-1" aria-disabled="true">Reportes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<form class="registro" action="../Controlador/validarInsertarUsuario.php" method="post">
 <img src="../Imagenes/add-friend.png" height="50">
 <h3>Registrar Usuario</h3>

  <div class="form-group">
    <input  type="text"  id="Nombres" name="Nombres"  placeholder="Nombre" class="mt-2 border-4" required>
  </div>
  <div class="form-group">
    <input  type="text"  id="Apellidos" name="Apellidos" placeholder="Apellidos" class="mt-2 border-4" required>
  </div>
  <div class="form-group">
    <input  type="text"  id="Cedula" name="Cedula" placeholder="Cédula" class="mt-2 border-4" required>
  </div>
  <div class="form-group">
    <input  type="text"  id="Cargo" name="Cargo" placeholder="Cargo" class="mt-2 border-4" required>
  </div>

  <div class="form-group">
    <input  type="text"  id="Area" name="Area" placeholder="Area" class="mt-2 border-4" required>
  </div>
  <div class="form-group">
    <input  type="email" id="Correo"  name="Correo"  placeholder="Correo" class="mt-2 border-4" required>
  </div>
   
        <button type="submit" class="btn btn-success mt-4">Registrar</button>
  
</form>


<br>
<br>
<br>


<h2>Usuarios Registrados</h2>

  <?php
  if ($msj==1)
  echo '<h3 style="color:green" align="center">Se ha Agregado el Usuario Correctamente</h3>';
  if ($msj==2)
  echo '<h3 style="color:red" align="center">Problemas al Agregar Usuario, Por favor revise los datos</h3>';
  if ($msj==3)
  echo '<h3 style="color:green" align="center">Se ha Modificado el Usuario Correctamente</h3>';
  if ($msj==4)
  echo '<h3 style="color:red" align="center">Problemas al Modificar Usuario, Por favor revise</h3>';
  if ($msj==5)
  echo '<h3 style="color:green" align="center">Se ha Eliminado el Usuario Correctamente</h3>';
  if ($msj==6)
  echo '<h3 style="color:red" align="center">Problemas al Eliminar Usuario, Por favor revise</h3>';
  ?>
  <br>
  
  <div id="datos" class = "consulta">
  </div>




<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../Js/Usuario.js"></script>
</body>
</html>