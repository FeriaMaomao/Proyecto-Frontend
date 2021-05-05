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
$objConexion=Conectarse();
$codusuario=$_GET["parametro"];
$sql="select * from usuarios where id_usuarios=$codusuario";
$data = $objConexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <link href="../CSS/Usuario.css" rel="stylesheet">
  <title>Actualización de Usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <script src="../Js/menu.js"> </script>
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


<div class="container">
 <form class="" action="../Controlador/validarActualizarUsuario.php" method="post">
  
 <h2>Modificar Usuario</h2>
  <br>
<div>
  <?php foreach ($data as $fila) { ?>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Id Usuario">ID Usuario </label>
    <input style="width:30%" type="text" class="mt-2 border-4" id="idusuario" name="idusuario" value="<?php echo $codusuario ?>" required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Nombres">Nombres </label>
    <input style="width:30%" type="text" class="mt-2 border-4" id="Nombres" name="Nombres" value="<?php echo $fila["Nombres"] ?>"required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Apellidos">Apellidos </label>
    <input style="width:30%" type="text" class="mt-2 border-4" id="Apellidos" name="Apellidos" value="<?php echo $fila["Apellidos"] ?>"required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Cedula">Cedula </label>
    <input style="width:30%" type="text" class="mt-2 border-4" id="Cedula" name="Cedula" value="<?php echo $fila["Cedula"] ?>"required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Cargo">Cargo </label>
    <input style="width:30%" type="text" class="mt-2 border-4" id="Cargo" name="Cargo" value="<?php echo $fila["Cargo"] ?>"required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Area">Area </label>
    <input style="width:30%" type="text" class="mt-2 border-4" id="Area" name="Area" value="<?php echo $fila["Area"] ?>"required>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="Correo">Correo </label>
    <input style="width:30%" type="email" class="mt-2 border-4" id="Correo" name="Correo" value="<?php echo $fila["Correo"] ?>"required>
  </div>


  <br>
  <br>
      <div align="middle">
        <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
        <button type="reset" class="btn btn-danger btn-lg">Cancelar</button>
      </div>
    <?php } ?>
</form>
</div>

</body>
</html>