<?php
session_start();
extract($_REQUEST); //recoger todas las variables que pasan Método GET o POST
require "../Modelo/conexionBasesDatos.php";
require "../Modelo/Perfiles.php";

//Creamos el objeto Usuario
$objConexion=Conectarse();
$objPerfil= new Perfil();

$objPerfil->crearPerfil($_REQUEST["Login"],md5($_REQUEST["Password"]),$_REQUEST["Rol"],$_REQUEST["Estado"]);

$resultado = $objPerfil->agregarPerfil();

if ($resultado){
	$messages[] = "El Perfil se ha registrado correctamente.";
	
	if (isset($messages)){
				
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
	}
	
	
}
else{


		$errors []= "No se logró registrar el perfil.";
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


?>
