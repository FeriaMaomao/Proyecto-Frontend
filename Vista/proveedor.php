<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
    header("location:../index.php?x=2");
if (!isset($_REQUEST['msj'])){
    $msj=0;
}
?>


<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="shortcut icon" href="../Imagenes/single-logo.png">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../CSS/styleProvider.css" />
    <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <title>Andromeda-Inventory</title>
    <script>
    function ModificarProveedor(codproveedor) {
        window.location = "demo/componentes/actualizarProveedor.php?parametro=" + codproveedor;
    }

    function EliminarProveedor(codproveedor) {
        window.location = "../Controlador/validarEliminarProveedor.php?parametro=" + codproveedor;
    }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark slider1">
        <div class="container">
            <a class="navbar-brand display-4 ml-4 mytext" href="nosotros.html">
                <img src="../Imagenes/logo andromeda.PNG" width="200" height="50"
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
                        <a class="nav-link" href="proveedor.php">Proveedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Reportes.php">Reporte</a>
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
                            <h4 class="title">Proveedores Registrados</h4>
                        </div>
                        <div class="card-content">
                            <div class="container">
                                <br>
                                <?php if($_SESSION['rol']==1) { ?>
                                <a data-target="#modalNuevoUsuario" data-toggle="modal"><button
                                        data-background-color="green" id="nuevo-usuario" class="btn btn-info">
                                        <i class="fa fa-plus"></i> Añadir Proveedor
                                    </button></a><?php } ?>
                                <div class="btn input-search">
                                    <input type="text" class="form-control" placeholder="Buscar Proveedor"
                                        name="caja_busqueda" id="caja_busqueda">
                                </div>
                                <br>
                                <?php
                                    if ($msj==1)
                                        echo '<h3 style="color:green" align="center">Se ha Agregado el Proveedor Correctamente</h3>';
                                    if ($msj==2)
                                        echo '<h3 style="color:red" align="center">Problemas al Agregar Proveedor, Por favor revise los datos</h3>';
                                    if ($msj==3)
                                        echo '<h3 style="color:green" align="center">Se ha Modificado el Proveedor Correctamente</h3>';
                                    if ($msj==4)
                                        echo '<h3 style="color:red" align="center">Problemas al Modificar Proveedor, Por favor revise</h3>';
                                    if ($msj==5)
                                        echo '<h3 style="color:green" align="center">Se ha Eliminado el Proveedor Correctamente</h3>';
                                    if ($msj==6)
                                        echo '<h3 style="color:red" align="center">Problemas al Eliminar Proveedor, Por favor revise</h3>';
                                ?>
                                <br>
                                <div id="datos">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir Proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-nu" role="form" action="../Controlador/validarInsertarProveedor.php"
                                        method="post">
                                        <div class="form-group">
                                            <label for="Nit">NIT: </label>
                                            <input style="width:80%" class="form-control" type="text" id="Nit"
                                                name="Nit" placeholder="Ingrese el NIT de la empresa a registrar"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Nombre">Nombre: </label>
                                            <input style="width:80%" type="text" class="form-control"
                                                id="NombreProveedor" name="NombreProveedor"
                                                placeholder="Ingrese el nombre de la empresa a registrar" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Direccion">Dirección: </label>
                                            <input style="width:80%" type="text" class="form-control"
                                                id="DireccionProveedor"
                                                placeholder="Ingrese la direccion de la empresa a registrar"
                                                name="DireccionProveedor" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Telefono">Teléfono: </label>
                                            <input style="width:80%" type="text" class="form-control"
                                                id="TelefonoProveedor" name="TelefonoProveedor"
                                                placeholder="Ingrese el telefono de la empresa a registrar" required>
                                        </div>
                                        <br>
                                        <br>
                                        <div align="middle">
                                            <button type="reset" class="btn btn-secondary">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../Js/Proveedor.js"></script>
    <script src="../Js/jquery.min.js"></script>
    <script src="../Js/popper.js"></script>
    <script src="../Js/bootstrap.min.js"></script>
    <script src="../Js/table.js"></script>
</body>

</html>