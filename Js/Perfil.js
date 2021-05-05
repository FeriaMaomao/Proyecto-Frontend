
$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#caja_busqueda").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'../Controlador/BuscarPerfiles.php?action=ajax&page='+page+'&caja_busqueda='+q,
		 beforeSend: function(objeto){
		 $('#loader').html('<img src="../Imagenes/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
			
		}
	})
}


$( "#cerrar_perfil").click(function() {

	location.reload();
 });




 function eliminarPerfil (id)
 {

	var q= $("#caja_busqueda").val();
	if (confirm("Realmente deseas eliminar el perfil")){	
	$.ajax({
	type: "GET",
	url: "../Controlador/BuscarPerfiles.php",
	data: "parametro="+id,"caja_busqueda":q,
	beforeSend: function(objeto){
		$("#datos").html("Mensaje: Cargando...");
	},
		success: function(datos){
		$("#datos").html(datos);
		load(1);
		}
		});
	}
 }


$( "#guardar_perfil" ).submit(function( event ) {
	$('#guardar_datos').attr("disabled", true);
	
   var parametros = $(this).serialize();
	   $.ajax({
			  type: "POST",
			  url: "../Controlador/validarInsertarPerfil.php",
			  data: parametros,
			   beforeSend: function(objeto){
				  $("#resultados_ajax").html("Mensaje: Cargando...");
				},
			  success: function(datos){
			  $("#resultados_ajax").html(datos);
			  $('#guardar_datos').attr("disabled", false);
			  
			}
	  });
	event.preventDefault();
  })


  $( "#editar_perfil" ).submit(function( event ) {
	$('#actualizar_datos').attr("disabled", true);
	
   var parametros = $(this).serialize();
	   $.ajax({
			  type: "POST",
			  url: "../Controlador/validarActualizarPerfil.php",
			  data: parametros,
			   beforeSend: function(objeto){
				  $("#resultados_ajax2").html("Mensaje: Cargando...");
				},
			  success: function(datos){
			  $("#resultados_ajax2").html(datos);
			  $('#actualizar_datos').attr("disabled", false);
			  load(1);
			}
	  });
	event.preventDefault();
  })




$('#mymodal2').on('show.bs.modal', function (event) {

	var button = $(event.relatedTarget) // Botón que activó el modal
	var login = button.data('login') 
	var password = button.data('password') 
	var rol = button.data('rol') 
	var estado = button.data('estado')
	var id = button.data('id') 
	var modal = $(this)
	modal.find('.modal-body #mod_id').val(id)
	modal.find('.modal-body #mod_login').val(login)
	modal.find('.modal-body #mod_password').val(password) 
	modal.find('.modal-body #mod_rol').val(rol)
	modal.find('.modal-body #mod_estado').val(estado)
  }) 