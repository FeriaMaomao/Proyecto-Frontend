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

$objConexion=Conectarse();
//Consulta Datos Perfil para mostrar en el registro de perfiles
$sql="select distinct Estado from perfil";
$perfil = $objConexion->query($sql);
//Consulta Datos Roles para mostrar en el registro de perfiles
$sql="select * from roles";
$roles = $objConexion->query($sql);


//require "../Modelo/conexionBasesDatos.php";

/* $objConexion=Conectarse();
$codperfil=$_GET["parametro"];
$sql="select * from perfil where Id=$codperfil";
$data = $objConexion->query($sql); */
?>

	<!-- Modal -->
	<div class="modal fade" id="mymodal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header bg-warning">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Modificar Perfil</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_perfil" name="editar_perfil">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
			  
				<label for="mod_login" class="col-sm-3 control-label">Login:</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_login" name="mod_login"  required>
					
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			   
			  			 
			  <div class="form-group">
				<label for="mod_password" class="col-sm-3 control-label">Password:</label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="mod_password" name="mod_password" required >
				</div>
			  </div>
			  

			  <div class="form-group">
				<label class="col-sm-3 control-label" for="Rol">Rol: </label>
				<div class="col-sm-8">
				<select  class="form-control" id="mod_rol" name="mod_rol" required>
				<option value="">Seleccione...</option>	
				<?php while ($rol=$roles->fetch_object()) { ?>
																		
						<option  value="<?php echo $rol->id_rol; ?>" >
							<?php echo $rol->id_rol. " " .$rol->tipo_rol ?>
						</option>

						<?php } ?>
						
						
					</select>
					</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="Estado">Estado: </label>
				<div class="col-sm-8">
				<select  class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">Seleccione...</option>
					<option>Activo</option>
					<option>Inactivo</option>
					</select>
				</div>
			</div>
			 
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar_perfil">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar Perfil</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		
	?>