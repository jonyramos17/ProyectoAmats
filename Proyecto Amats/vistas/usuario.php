<!DOCTYPE html>
<html lang="en">
<head>

<?php

include_once"formato.php"; 
include_once"script.php";

require_once"../conexion/conexion.php";

session_start();
$usuario_activo=$_SESSION['usuario'];

if(!isset($usuario_activo)){
  header("location: login.html");
}else{

?>
<title>Usuario</title>
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
  <div class="container-fluid contenido">

  <br>
      <div class="card text-left">
  					<div class="card-header">
					    <h3>Usuarios</h3>
  					</div>
  					<div class="card-body">
            <span class="btn btn-primary" data-toggle="modal" data-target="#nuevoUsuario">Agregar nuevo
                            <span><img src="../recursos/agregar.png" class="icono_opciones"></span>
                        </span>	
						<hr>
						<div id="tablaUsuario">

            </div>	
  					</div>
 				 	<div class="card-footer text-muted text-center">
                     <h5>NATHALI CLOSETH</h5> 
  					</div>
				</div>
  <br>

  </div>
  
</div>
<!--      FIN DE CONTENIDO Y CABECERA      -->
  
<!--       VENTANA EMERGENTE PARA AGREGAR NUEVO USUARIO     -->

<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
              <form id="form_nuevoUsuario">
                  <label>Nombre</label>
                  <input type="text" class="form-control input-sm" id="nombreUsuario" name="nombreUsuario">
                  <label>Contraseña</label>
                  <input type="password" class="form-control input-sm" id="contrasenaUsuario" name="contrasenaUsuario">
                  <label>Rol</label>
                  <select class="form-control input-sm" id="rolUsuario" name="rolUsuario">
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                  </select><br> 
                  
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btn_nuevoUsuario">Agregar Usuario</button>
        </div>
    </div>
  </div>
</div>
<!-- Fin de ventana emergente -->

<!--VENTANA EMERGENTE DE EDITAR USUARIO -->

<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form id="form_nuevoUsuarioU" method="POST">
          <input type="text" hidden="" id="idUsuario" name="idUsuario">
                  <label>Nombre</label>
                  <input type="text" class="form-control input-sm" id="nombreUsuarioU" name="nombreUsuarioU">
                  <label>Contraseña</label>
                  <input type="text" class="form-control input-sm" id="contrasenaUsuarioU" name="contrasenaUsuarioU">
                  <label>Rol</label>
                  <select class="form-control input-sm" id="rolUsuarioU" name="rolUsuarioU">
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                  </select><br> 
                  
              </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>



<!--FIN VENTANA EMERGENTE DE EDITAR USUARIO -->


  </div>
<!-- DIV DE CIERRE DE FORMATO.php (estructura) -->

<!-- Footer -->
<footer class="page-footer font-small blue pie_pagina">
     <!--redes sociales-->

 <!--  -->


<div class="footer-copyright text-center py-3">
  <ul class="social-icons" >
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-facebook"></i></a></li>
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-instagram"></i></a></li>
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-twitter"></i></a></li>   
</ul>
</div>

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

<!--                               FIN HTML                                            -->

<!-- SCRIPT PARA LLAMAR TABLA -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaUsuario').load('tablas/tabla_usuario.php');
	});
</script>


<!-- SCRIPT PARA INGRESAR NUEVOS REGISTROS A LA TABLA USUARIO -->

<script type="text/javascript">
  $(document).ready(function(){
      $('#btn_nuevoUsuario').click(function(){

        datos=$('#form_nuevoUsuario').serialize();
          
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/usuario/agregar_usuario.php",
            success:function(r){
              if (r==1) {
                $('#form_nuevoUsuario')[0].reset();
               $('#tablaUsuario').load('tablas/tabla_usuario.php');
              alertify.success("Usuario agregado con exito");
            }
             else{
               alertify.error("Error al agregar usuario");
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

      $('#idUsuario').val(d[0]);
      $('#nombreUsuarioU').val(d[1]);
      $('#contrasenaUsuarioU').val(d[2]);
      $('#rolUsuarioU').val(d[3]);
    
    } 

      $('#btnActualizar').click(function(){

        datos=$('#form_nuevoUsuarioU').serialize();
          
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/usuario/actualizar_usuario.php",
            success:function(r){
              if (r==1){
               $('#tablaUsuario').load('tablas/tabla_usuario.php');
              alertify.success("Actualizado con exito");
            }
             else{
               alertify.error("Error al actualizar!");
             }
          }
            
        });


      })

  function consultarEliminarUsuario(id){
  
  alertify.confirm('Eliminar Usuario', 'Esta seguro que desea eliminar ese usuario', function(){ eliminarUsuario(id) }
                , function(){ alertify.error('Se cancelo')});

  }

  function eliminarUsuario(id){
      datos="id="+id;

      $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/usuario/eliminar_usuario.php",
            success:function(r){
              if(r==1){
                $('#tablaUsuario').load('tablas/tabla_usuario.php');
                alertify.success("Usuario eliminado");
              }else{
                alertify.error("No se pudo eliminar el usuario");
              }
          }
            
        });

  }

</script>

<!-- Cierre de la validacion de la session usuario -->
<?php } ?>