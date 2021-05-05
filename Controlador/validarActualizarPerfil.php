<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST

if (empty($_POST['mod_id'])) {
	$errors[] = "ID vacío";
 }else if (empty($_POST['mod_login'])) {
	$errors[] = "Login vacío";
 } else if (empty($_POST['mod_password'])) {
	$errors[] = "Password vacío";
 
 }else if (empty($_POST['mod_rol'])) {
	$errors[] = "Rol vacío";
 
 }else if (empty($_POST['mod_estado'])) {
	$errors[] = "Estado vacío";

 }else if ( !empty($_POST['mod_id']) && !empty($_POST['mod_login']) && !empty($_POST['mod_password']) && !empty($_POST['mod_rol']) && !empty($_POST['mod_estado'])   ){

	require "../Modelo/conexionBasesDatos.php";
	require "../Modelo/Perfiles.php";


	//Creamos el objeto Usuario
	$objConexion=Conectarse();
	$objPerfil= new Perfil();

	$objPerfil->crearPerfil2($_REQUEST["mod_id"],$_REQUEST["mod_login"],md5($_REQUEST["mod_password"]),$_REQUEST["mod_rol"],$_REQUEST["mod_estado"]);

	$resultado = $objPerfil->ActualizarPerfil();
	
	if ($resultado){

		$messages[] = "El Perfil ha sido actualizado exitosamente!.";
		
		?>
		<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>¡Bien hecho!</strong>
				<?php
					foreach ($messages as $message) {
							echo $message;
						}
					?>
		</div>
		<?php


	}else{

		$errors []= "Error desconocido.";

		?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error!</strong> 
				<?php
					foreach ($errors as $error) {
							echo $error;
						}
					?>
		</div>
		<?php

		

	}

		




 }







	
?>