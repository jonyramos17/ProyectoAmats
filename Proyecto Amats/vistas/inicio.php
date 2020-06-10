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
<title>Inicio</title>
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

<!-- Fecha y hora -->
<div class="">
 
</div>


 <!--        Para agregar los detalles del usuario             --> 
  <div class="divUsuario">
    <!-- <button id="mostrarUsuario" class="btnUsuario"></button> -->
 
  </div>
    
</nav>

    <!--                         AQUI VA EL CONTENIDO                      -->
  <div class="container-fluid contenido">
        <!-- Div para poner los detalles del usuario -->
        <div id="divocultamuestra" class="divDetalleUsuario">
          <div class="divNombreDetalles"> <br>
          <img src="../recursos/detalle_usuario.png" class="icono_detalleUsuario"> 
          
          <?php
            echo"<p class='titulo_detalleUsuario'>Bienvenido:&nbsp";
            echo $usuario_activo;
            echo"</p>";
          ?>
          </div>
          <div class="div_opcionesDetalles">
            <button class="btn_detalleUsuario"><a href="usuario.php" class="a_detalleUsuario">Admin</a></button>
            <button class="btn_detalleUsuario"><a href="salir.php" class="a_detalleUsuario">Cerrar Sesion</a></button>
          </div>
          
          </div>
<br>
          
              <div id="grafica">

              </div>
            
          <br><br><br>
          
    </div>


  
</div>
<!--      FIN DE CONTENIDO Y CABECERA      -->
  




  </div>
<!-- DIV DE CIERRE DE FORMATO.php (estructura) -->

<!-- Footer -->
<footer class="page-footer font-small blue pie_pagina">
    <!--redes sociales-->



<div class="footer-copyright text-center py-3"> <div align="center"><ul class="social-icons" >
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-facebook"></i></a></li>
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-twitter"></i></a></li>   
  <li><a href="#" class="social-icon" style="color: blue;"> <i class="fa fa-instagram"></i></a></li>
</ul>
</div>
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
  
  <!-- Detalles del usuario -->

  <script>
    $(document).ready(function(){
   $("#botonocultamuestra").click(function(){
      $("#divocultamuestra").each(function() {
        displaying = $(this).css("display");
        if(displaying == "block") {
          $(this).fadeOut('slow',function() {
           $(this).css("display","none");
          });
        } else {
          $(this).fadeIn('slow',function() {
            $(this).css("display","block");
          });
        }
      });
    });
  });
  </script>
  
<!-- mostrar grafica -->

<script type="text/javascript">
  $(document).ready(function(){
		$('#grafica').load('graficas/grafico_ventas.php');
	});
</script>



<!-- Cierre de la validacion de la session usuario -->
<?php } ?>