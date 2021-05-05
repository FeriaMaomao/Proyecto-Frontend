<?php

  session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
  
if(!isset($_REQUEST['msj'])){
    $msj=0;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Perfiles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="../CSS/estiloPerfil.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   
 
</head>


<body  style="background-color:#d4d4d4;">
<nav class="navbar navbar-default">
  <div class="container-fluid">


  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div>
            <a class="navbar-brand" href="../Vista/nosotros.html"> <i class='glyphicon glyphicon-home'> </i> </a>

            <a href="../Vista/nosotros.html"> <img alt="Brand" src="../Imagenes/logo_andromeda_reduc.PNG"></a>
      </div>

    </div>

  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class=""><a href="../Vista/RegistroUsuario.php"><i class='glyphicon glyphicon-user'></i> Usuarios</a></li>
          <li class=""><a href="../Vista/listaInventario.php"><i class='glyphicon glyphicon-tags'></i> Inventario</a></li>
          <li class=""><a href="../Vista/proveedor.php"><i  class='glyphicon glyphicon-lock'></i> Proveedores</a></li>
          <li class=""><a href="../Vista/reportes.php"><i  class='glyphicon glyphicon-file'></i> Reportes</a></li>
          <?php if($_SESSION['rol']==1) { ?>

            <li class=""><a href="../Vista/listaPerfiles.php"><i  class='glyphicon glyphicon-cog'></i> Perfiles</a></li>

          <?php } ?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
    
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user" style="color:#FFFFFF"></span>  <?php echo $_SESSION['user']?><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="salir.php" onmouseover="mopen('m1')" onmouseout="mclosetime()"><i class='glyphicon glyphicon-off'></i> Cerrar Sesion</a></li>
            </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
<br>
<br>

   

<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
		    
        <div class="btn-group pull-right">
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoPerfil">
				<span class="glyphicon glyphicon-plus" ></span> Agregar Perfil</button>
			  </div>

			<h4><i class='glyphicon glyphicon-search'></i> Buscar Perfil</h4>
		</div>

        <div class="panel-body">
        
                
          <?php
            include("../ventanasModal/registrar_perfiles.php");
            include("../ventanasModal/modificar_perfiles.php");
          ?>
          <form class="form-horizontal" role="form" id="datos_cotizacion">
            
                <div class="form-group row">
                  <label for="q" class="col-md-2 control-label">Nombre</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="caja_busqueda" id="caja_busqueda" placeholder="Ingrese perfil" onkeyup='load(1);'>
                  </div>
                  <div class="col-md-3">
                    <button type="button" class="btn btn-default" onclick='load(1);'>
                      <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                    <span id="loader"></span>
                  </div>
                  
                </div>
                  
          </form>
          <br>


            <div id="datos" ></div> 
            <div class='outer_div'></div> 
          
        </div>
  </div>
    
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="../Js/Perfil.js"></script>

</body>
</html>