<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php?x=2");//x=2 significa que no han iniciado sesión

  
  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

    $mysqli = new mysqli("localhost","admin","1234567890","andromedadb");
       
    if (isset($_GET['parametro'])){
     
      $codigoeliminar=$_GET["parametro"];
      $sql="delete from perfil where perfil.Id=$codigoeliminar";
      $resultado = $mysqli->query($sql);

      if ($resultado){

        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Aviso!</strong> Datos eliminados exitosamente.
        </div>
        <?php 
      }
      else{
      
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Error!</strong> Lo siento no se pudo eliminar el Perfil
        </div>
        <?php
      }

    }
   
    
    
    if($action == 'ajax'){


      $q = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['caja_busqueda'], ENT_QUOTES)));
      $aColumns = array('Login');//Columnas de busqueda
      $sTable = "perfil";
      $sWhere = "";
     if ( $_GET['caja_busqueda'] != "" )
     {
       $sWhere = "where ID LIKE '%".$q."%' OR Login LIKE '%".$q."%' OR Estado LIKE '%".$q."%' OR Rol LIKE '%".$q."%' ";
     }

    


     include("../ajax/pagination.php");



    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;

    
		$per_page = 4; //how much records you want to show
		$adjacents  = 2; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query  = mysqli_query($mysqli , "SELECT count(*) AS numrows FROM  $sTable $sWhere ");
   	$row= mysqli_fetch_array($count_query);

   	$numrows = $row['numrows'];
   	$total_pages = ceil($numrows/$per_page);
    $reload = './clientes.php';

    $sql="SELECT * FROM  $sTable  $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($mysqli , $sql);

   
 if ($numrows>0) { 

  ?>
  <div class="table-responsive">
    <table class="table">
    <tr  class="bg-primary">
        <th>ID Perfil</th>
        <th>Login</th>
        <th>Rol</th>
        <th>Estado</th>
        <th class='text-right'>Acciones</th>
      
    </tr>
    <?php

        while ($row=mysqli_fetch_array($query)){

	          $id_perfil=$row['ID'];
						$login=$row['Login'];
            $password=$row['Password'];
						$rol=$row['Rol'];
            $estado_perfil=$row['Estado'];
            

            ?>
            <tr>
              
              <td><?php echo $id_perfil; ?></td>
              <td ><?php echo $login; ?></td>
              <td><?php echo $rol?></td>
            
              <?php if( $estado_perfil=="Activo") { ?>

              <td class='text-center'> <div  style="background-color:#98e0b0;"><span style="font-weight:bold"><?php echo  $estado_perfil;?></span></div></td>
                      
              <?php }else{ ?>

                <td class='text-center'><div  style="background-color:hsl(0, 84%, 80%);"><span style="font-weight:bold">Inactivo</span></div></td>

               <?php } ?>

            <td class='text-right'>

            <div class='text-rigth'><div class='btn-group'><button class='btn btn-info btnEditar' title='Editar categoría' data-id='<?php echo $id_perfil;?>' data-login='<?php echo $login;?>'
            data-password='<?php echo $password;?>'  data-rol='<?php echo $rol;?>' data-estado='<?php echo $estado_perfil;?>' data-toggle="modal" data-target="#mymodal2"> <i class="glyphicon glyphicon-edit"></i>Editar</button>
            


              <button class='btn btn-danger btnBorrar' title='Borrar categoría' onclick="eliminarPerfil('<?php echo $id_perfil;?>')" ><i class="glyphicon glyphicon-trash"></i> Borrar</button></div></div> 
              
              <!-- <a href="#" class='btn btn-default' title='Borrar categoría' onclick="eliminarPerfil('<?php echo $id_perfil;?>')"><i class="glyphicon glyphicon-trash"></i> </a> -->


            </td>
              
            </tr>
           
            <?php


      }

      ?>
				<tr>
					<td colspan=5><span class="pull-right">
					<?php
					  echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>

<br>
<br>
      <div class="navbar navbar-default navbar-fixed-bottom" >
  <div class="container">
    <p class="navbar-text pull-left">&copy Pablo Albeiro Valencia Aguirre.
         <a href="" target="_blank" style="color: #ecf0f1">Front End</a>
    </p>
 </div>
</div>


			<?php


} else{

    $errors []= "No se encontraron datos."
    ?>
    <div class="alert alert-warning" role="warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Aviso!</strong> 
        <?php
          foreach ($errors as $error) {
              echo $error;
            }
          ?>
    </div>
    <?php

    }
    
  }
  
    $mysqli->close();

?>