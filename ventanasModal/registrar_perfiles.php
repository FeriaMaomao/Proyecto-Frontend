<?php

extract ($_REQUEST);
if (!isset($_SESSION['user'])){
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión
}
else{
  if($_SESSION['rol'] !=1){
    header("location:../Vista/listaPerfiles.php");
  }
}

require "../Modelo/conexionBasesDatos.php";
$objConexion=Conectarse();
//Consulta Datos Perfil para mostrar en el registro de perfiles
$sql="select distinct Estado from perfil";
$perfil = $objConexion->query($sql);
//Consulta Datos Roles para mostrar en el registro de perfiles
$sql="select * from roles";
$roles = $objConexion->query($sql);

?>


	<!-- Modal -->
	<div class="modal fade" id="nuevoPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo Perfil</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post"  id="guardar_perfil" name="guardar_perfil">
			<div id="resultados_ajax"></div>

	
			  <div class="form-group">
				<label class="col-sm-3 control-label" for="Login">Login: </label>
				<div class="col-sm-8">
				<input  type="text" class="form-control" id="Login" name="Login" placeholder="Ingrese un alias para el usuario" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="Password">Password: </label>
				<div class="col-sm-8">
				<input  type="password" class="form-control" id="Password" name="Password" placeholder="Ingrese la contraseña" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="Rol">Rol: </label>
				<div class="col-sm-8">
				<select  class="form-control" id="Rol" name="Rol" required>
					<option value="">Seleccione...</option>
					<?php while ($rol=$roles->fetch_object()) { ?>
					<option value=" <?php echo $rol->id_rol; ?> " >
						<?php echo $rol->id_rol. " " .$rol->tipo_rol ?>
					</option>
						<?php } ?>
					</select>
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="Estado">Estado: </label>
				<div class="col-sm-8">
				<select  class="form-control" id="Estado" name="Estado" required>
					<option value="">Seleccione...</option>
					<option>Activo</option>
					<option>Inactivo</option>
					</select>
				</div>
			</div>
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar_perfil">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar Perfil</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		
	?>