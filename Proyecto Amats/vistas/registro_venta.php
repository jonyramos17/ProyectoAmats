<!DOCTYPE html>
<html lang="es">
<head>

<?php

include_once"formato.php";
include_once"script.php";
include_once"../conexion/conexion.php";
//sentencia para conectar con conexion.php
$conexion=conectar();

session_start();
$usuario_activo=$_SESSION['usuario'];

if(!isset($usuario_activo)){
  header("location: login.html");
}else{

?>
<title>Registro de ventas</title>
  
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
					    <h3>Agregar venta</h3>
  					</div>
  					<div class="card-body">
            
            <form id="formAgregarVenta" method="post">
                <label>Nombre cliente</label>
                <input type="text" class="form-control input-sm" id="nombreCliente" name="nombreCliente" required=''>
                <?php
                  date_default_timezone_set('America/El_Salvador');
                  $fecha= date("Y-m-d");
                ?>
                <label>Fecha</label>
                <input type="date" class="form-control input-sm" id="fechaVenta" value="<?php echo $fecha?>" name="fechaVenta" placeholder="<?= $fecha?>" readonly>
                <label>Producto</label>
                <select class="form-control input-sm" id="eleccionProducto" name="eleccionProducto">
                <?php
                                $sql="SELECT id_producto, 
                                                nombre_producto,
                                                descripcion,
                                                precio_producto,
                                                fk_id_categoria 
                                        FROM productos order by fk_id_categoria ";
                                    $result=mysqli_query($conexion,$sql);
                            
                            while($agg_producto=mysqli_fetch_row($result)){
                            ?>
                                <option value="<?php echo $agg_producto[0]?>"><?php echo $agg_producto[1]. "&nbsp"; echo $agg_producto[2]. "&nbsp"; echo "\$". $agg_producto[3]. "&nbsp" ;?></option>
                            <?php } ?>
                </select>
                <label for="">Cantidad</label>
                <input type="number" class="form-control input-sm" min="1" id="elec_cantidadProducto" name="elec_cantidadProducto" required=''>
						<!-- <div id="tablaDetalleVenta">
            </div> -->
            <br>
            <button id="btnGuardarVenta" class="btn btn-primary">Registrar Venta</button>	
            <button type="reset" class="btn btn-info">Limpiar</button>
            </form>
  					</div>
 				 	<div class="card-footer text-muted text-center">
                      <h5>NATHALI CLOSETH</h5>
  					</div>
				</div>


<br>

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


<!-- AGREGANDO Venta  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnGuardarVenta').click(function(){
            var datos=$('#formAgregarVenta').serialize();
            // alert(datos);
            // return false;
            $.ajax({
                type:"POST",
                url:"../procesos/venta/agregar_venta.php",
                data:datos,
                success:function(r){
                    if(r==1){
                        alertify.success("Venta registrada con exito");
                    }else{
                        alertify.error("NO SE PUDO REGISTRAR LA VENTA");
                    }
                }
            });
            return false;
        });
    });
</script>

<!-- Cierre de la validacion de la session usuario -->
<?php } ?>