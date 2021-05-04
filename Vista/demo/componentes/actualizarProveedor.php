<?php

session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
    header("location:../../../index.php?x=2");
if (!isset($_REQUEST['msj'])){
    $msj=0;
}


require "../../../Modelo/conexionBasesDatos.php";
$objConexion=Conectarse();
$codproveedor=$_GET["parametro"];
$sql="select * from proveedor where id_Proveedor=$codproveedor";
$dato = $objConexion->query($sql);
?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="shortcut icon" href="../../../Imagenes/single-logo.png">
    <link rel="stylesheet" href="../../../CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../CSS/styleProvider.css" />
    <link rel="stylesheet" href="../../../fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <title>Andromeda-Inventory</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark slider1">
        <div class="container">
            <a class="navbar-brand display-4 ml-4 mytext" href="nosotros.html">
                <img src="../../../Imagenes/logo andromeda.PNG" width="200" height="50"
                    class="d-inline-block align-top img-fluid" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listaInventario.html">Inventario</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../../proveedor.php">Proveedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../Reportes.php">Reporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Perfiles.html">Perfiles</a>
                    </li>
                </ul>
                <div id="btn-menu" class="pull-right collapse navbar-collapse justify-content-end">
                    <div class="dropdown show">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i> Administrador
                        </a>
                        <div div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="salir.php" onmouseover="mopen('m1')"
                                onmouseout="mclosetime()"><span class="fa fa-sign-out"></span> Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <br />
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="green">
                            <h4 class="title">Actualizar Proveedor</h4>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <br>
                                <a href="../../proveedor.php" target="_self"><button title="Ver Usuarios" type="button"
                                        class="btn btn-primary"><span class="fa fa-forward"></span>
                                        <span class="fa fa-table"></span></button></a>
                                <br>
                                <br>
                                <form role="form" action="../../../Controlador/validarActualizarProveedor.php"
                                    method="post">
                                    <?php foreach($dato as $fila) { ?>
                                    <div align="middle" class="form-group">
                                        <label class="control-label col-sm-4" for="ID Proveedor">ID Proveedor:
                                        </label>
                                        <input style="width:30%" type="text" class="form-control" id="idproveedor"
                                            name="idproveedor" value="<?php echo $codproveedor ?>" required>
                                    </div>
                                    <div align="middle" class="form-group">
                                        <label class="control-label col-sm-4" for="Nit">Nit: </label>
                                        <input style="width:30%" type="text" class="form-control" id="Nit" name="Nit"
                                            value="<?php echo $fila["NIT"] ?>" required>
                                    </div>
                                    <div align="middle" class="form-group">
                                        <label class="control-label col-sm-4" for="Nombre">Nombre: </label>
                                        <input style="width:30%" type="text" class="form-control" id="NombreProveedor"
                                            name="NombreProveedor" value="<?php echo $fila["Nombre"] ?>" required>
                                    </div>
                                    <div align="middle" class="form-group">
                                        <label class="control-label col-sm-4" for="Direccion">Dirección: </label>
                                        <input style="width:30%" type="text" class="form-control"
                                            id="DireccionProveedor" name="DireccionProveedor"
                                            value="<?php echo $fila["Direccion"] ?>" required>
                                    </div>
                                    <div align="middle" class="form-group">
                                        <label class="control-label col-sm-4" for="Telefono">Teléfono: </label>
                                        <input style="width:30%" type="text" class="form-control" id="TelefonoProveedor"
                                            name="TelefonoProveedor" value="<?php echo $fila["Telefono"] ?>" required>
                                    </div>
                                    <br>
                                    <br>
                                    <div align="middle">
                                        <button type="reset" class="btn btn-secondary">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background: #383c44" class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <p style="color: white" class="navbar-text pull-left">&copy Andromeda Inventory</p>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../../Js/Proveedor.js"></script>
    <script src="../../../Js/jquery.min.js"></script>
    <script src="../../../Js/popper.js"></script>
    <script src="../../../Js/bootstrap.min.js"></script>
    <script src="../../../Js/table.js"></script>
</body>

</html>