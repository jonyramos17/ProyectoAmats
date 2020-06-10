<!DOCTYPE html>
<html lang="en">
<head>

<?php

include_once"formato.php"; 
include_once"script.php";

session_start();
$usuario_activo=$_SESSION['usuario'];

if(!isset($usuario_activo)){
  header("location: login.html");
}else{

?>
<title>Categorias</title>

  <style>
  @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css);
  .social-icons li {
    vertical-align: top;
    display: inline;
    font-size: 2em;
    padding: 0.5em;
  }
  </style>

</head>

 <!--                                    CABECERA Y CONTENIDO                                -->
 <div id="page-content-wrapper">

<!--            Cabecera          -->
<nav class="navbar navbar-expand-lg border-bottom cabecera">
  <button class="btn boton_desplegar" id="menu-toggle"><img src="../recursos/desplegar.png" class="img_desplegar"></button>

 <!--        Para agregar los detalles del usuario             --> 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
  </div>
</nav>

    <!--                         AQUI VA EL CONTENIDO                      -->
  <div class="container-fluid contenido ">

<!--                            INICIO TABLA DE CATEGORIA                           -->
  <br>
      <div class="card text-left">
  					<div class="card-header">
					    <h3>Categorias</h3>
  					</div>
  					<div class="card-body">
            <span class="btn btn-primary" data-toggle="modal" data-target="#nuevaCategoria">Agregar nueva
                            <span><img src="../recursos/agregar.png" class="icono_opciones"></span>
                        </span>	
						<hr>
						<div id="tablaCategoria">

                        </div>	
  					</div>
 				 	<div class="card-footer text-muted text-center">
                      <h5>NATHALI CLOSETH</h5>
  					</div>
				</div>


  <br>
<!--                               FIN          TABLA                            -->

  </div>
  
</div>
<!--      FIN DE CONTENIDO Y CABECERA      -->
  
<!--       VENTANA EMERGENTE PARA AGREGAR NUEVA CATEGORIA     -->

<div class="modal fade" id="nuevaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="form_nuevaCategoria" method="POST">
                <label>Nombre</label>
                <input type="text" class="form-control input-sm" id="nombreCategoria" name="nombreCategoria"> 
                
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_nuevaCategoria">Agregar Categoria</button>
      </div>
    </div>
  </div>
</div>


<!--       VENTANA EMERGENTE PARA EDITAR  CATEGORIA     -->

<div class="modal fade" id="nuevaCategoriaU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="form_nuevaCategoriaU" method="POST">
            <input type="text" hidden="" id="idCategoria" name="idCategoria">
                <label>Nombre</label>
                <input type="text" class="form-control input-sm" id="nombreCategoriaU" name="nombreCategoriaU"> 
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn_nuevaCategoriaU">Actualizar</button>
      </div>
    </div>
  </div>
</div>






  </div>
<!-- DIV DE CIERRE DE FORMATO.php (estructura) -->

<!-- Footer -->
<footer class="page-footer font-small blue pie_pagina">

     <!--redes sociales-->

 
<div class="footer-copyright text-center py-3 "><div align="center"><ul class="social-icons" >
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-facebook"></i></a></li>
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-twitter"></i></a></li>   
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-instagram"></i></a></li>
</ul>
</div></div>

</footer>
<!-- Footer -->
</html>


<!--                               FIN HTML                                            -->

<!-- Menu que se desplaza -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

<!-- SCRIPT PARA LLAMAR TABLA -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCategoria').load('tablas/tabla_categoria.php');
	});
</script>


<!-- SCRIPT PARA INGRESAR NUEVOS REGISTROS A LA TABLA INVENTARIO -->

<script type="text/javascript">
  $(document).ready(function(){
      $('#btn_nuevaCategoria').click(function(){

        datos=$('#form_nuevaCategoria').serialize();
          
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/categoria/agregar_categoria.php",
            success:function(r){
              if (r==1) {
                $('#form_nuevaCategoria')[0].reset();
               $('#tablaCategoria').load('tablas/tabla_categoria.php');
              alertify.success("Categoria agregada con exito");
            }
             else{
               alertify.error("Error al agregar categoria");
             }
          }
            
        });

      });

  });

</script>

<!-- AGREGAR DATOS A FORMULARIO EDITAR PARA ACTUALIZAR -->
<script>
    function agregarform(datos){
      
      d=datos.split('||');

      $('#idCategoria').val(d[0]);
      $('#nombreCategoriaU').val(d[1]);
    
    } 

      $('#btn_nuevaCategoriaU').click(function(){

        datos=$('#form_nuevaCategoriaU').serialize();
          
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/categoria/actualizar_categoria.php",
            success:function(r){
              if (r==1){
                $('#tablaCategoria').load('tablas/tabla_categoria.php');
              alertify.success("Actualizado con exito");
            }
             else{
               alertify.error("Error al actualizar!");
             }
          }
            
        });


      })

  function consultarEliminarCategoria(id){
  
  alertify.confirm('Eliminar Categoria', 'Esta seguro que desea eliminar esa categoria', function(){ eliminarCategoria(id) }
                , function(){ alertify.error('Se cancelo')});

  }

  function eliminarCategoria(id){
      datos="id="+id;

      $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/categoria/eliminar_categoria.php",
            success:function(r){
              if(r==1){
                $('#tablaCategoria').load('tablas/tabla_categoria.php');
                alertify.success("Categoria eliminada");
              }else{
                alertify.error("No se pudo eliminar la categoria");
              }
          }
            
        });

  }

</script>


<!-- Cierre de la validacion de la session usuario -->
<?php } ?>