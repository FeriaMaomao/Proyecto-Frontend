<?php
session_start();
extract ($_REQUEST);
if (!isset($_REQUEST['x']))
	$x=0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inicio de Sesion</title>
	<link rel="stylesheet" type="text/css" href="CSS/Index.css">
	<link rel="stylesheet" type="text/css" href="fonts/style.css">
	<meta charset="utf-8">
</head>
<body>
<form action="Controlador/validarIniciarSesion.php" class="login" autocomplete="off">
    <h1 class="login-title"><span class="icon-users"></span> Inicio de Sesion</h1>
    <input type="text" class="login-input" placeholder="Usuario" autofocus id="login" name="login" required>
    <input type="password" class="icon-user login-input" placeholder="Contraseña" id="pass" name="pass" required>
    <button class="login-button"><span class="icon-login" style="color:#FFFFFF"></span> Iniciar</button>
  </form>
</body>
</html>

<?php

if ($x==1)
	echo "<br><h3 align='center' style='color:#ffffff' > Usuario no registrado con los datos ingresados, vuelva a intentar";
if ($x==2)
	echo "<br><h3 align='center' style='color:#ffffff'> Deben Iniciar Sesión para poder ingresar a la Aplicación";
if ($x==3)
	echo "<br><h3 align='center' style='color:#ffffff'> El Usuario ha cerrado la Sesión";
?>