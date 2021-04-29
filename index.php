<?php
session_start();
extract ($_REQUEST);
if (!isset($_REQUEST['x']))
	$x=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src=""></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
</head>
<body>
  <form action="Controlador/validarIniciarSesion.php" class="login" autocomplete="off">
      <div class="Login">
          <div class="form">
              <h2>Bienvenido de Nuevo</h2>
              <h1>Andromeda Inventory</h1>
              <input type="text" placeholder="Usuario" autofocus id="login" name="login" required>
              <input type="password" placeholder="Contraseña" autofocus id="pass" name="pass" required>
              <Br></Br>
              <Br></Br>
              <button class="btn btn-default btn-lg btn-block">Iniciar Sesion</button>
          </div>
        </div>
  </form>
</body>
</html>

<?php

if ($x==1)
	echo "<br><h3 align='center' style='color:#000000' > Usuario no registrado con los datos ingresados, vuelva a intentar </h3>";
if ($x==2)
	echo "<br><h3 align='center' style='color:#000000'> Deben Iniciar Sesión para poder ingresar a la Aplicación </h3>";
if ($x==3)
	echo "<br><h3 align='center' style='color:#000000'> El Usuario ha cerrado la Sesión </h3>";
?>