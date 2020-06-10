<!DOCTYPE html>
<html lang="en">
<head>

<?php

include_once"formato.php"; 

session_start();
$usuario_activo=$_SESSION['usuario'];

if(!isset($usuario_activo)){
  header("location: login.html");
}else{

?>
<title>Reporte de Ventas</title>
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

    <!--                            INICIO TABLA DE REPORTE DE VENTA                           -->
  <br>
      <div class="card text-left">
  					<div class="card-header">
					    <h3>Reporte de Ventas</h3>
  					</div>
  					<div class="card-body">
						
						<hr>
						<div id="tablaVenta">

                        </div>	
  					</div>
 				 	<div class="card-footer text-muted text-center">
                     <h5>NATHALI CLOSETH</h5> 
  					</div>
        </div>
  <br>
<!--                               FIN  DE REPORTE DE VENTA                          -->






  </div>
  
</div>
<!--      FIN DE CONTENIDO Y CABECERA      -->
  




  </div>
<!-- DIV DE CIERRE DE FORMATO.php (estructura) -->

<!-- Footer -->
<footer class="page-footer font-small blue pie_pagina">

       <!--redes sociales-->
     
 

<div class="footer-copyright text-center py-3"><div align="center"><ul class="social-icons" >
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
		$('#tablaVenta').load('tablas/tabla_reportes.php');
	});
</script>



<script>

function consultarEliminarVenta(id){
  
  alertify.confirm('Eliminar Venta', 'Esta seguro que desea eliminar esa venta', function(){ eliminarventa(id) }
                , function(){ alertify.error('Se cancelo')});

  }

function eliminarventa(id){
      datos="id="+id;

      $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/venta/eliminar_venta.php",
            success:function(r){
              if(r==1){
                $('#tablaVenta').load('tablas/tabla_reportes.php');
                alertify.success("Venta eliminado");
              }else{
                alertify.error("No se pudo eliminar la Venta");
              }
          }
            
        });

  }

</script>



<!-- Cierre de la validacion de la session usuario -->
<?php } ?>