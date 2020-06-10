<!DOCTYPE html>
<html lang="en">
<head>

<?php

include_once"formato.php"; 
include_once"script.php";
include_once"../conexion/conexion.php";


 //sentencia para conectar con conexion.php
    $conexion=conectar();
//

session_start();
$usuario_activo=$_SESSION['usuario'];

if(!isset($usuario_activo)){
  header("location: login.html");
}else{

?>
<title>Registrar Productos</title>
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
        <div class="card text-center">
            <div class="card-header">
                <h3>Registro de Productos</h3>
            </div>
                <div class="card-body">
                <form method="post" id="formProductos">
                    <div class="form-group row">
                        <label for="nombreproducto" class="col-sm-2 col-form-label">Nombre Producto</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre_producto" placeholder="Nombre" name="nombre_producto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categoriaproducto" class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                        <select name="categoria_producto" class="form-control" id="categoria_producto">
                            <!-- Programando select de categoria -->
                            <?php
                                $sql="SELECT id_categoria, 
                                                nombre_categoria 
                                        FROM categorias";
                                    $result=mysqli_query($conexion,$sql);
                            
                            while($mostrar_cat=mysqli_fetch_row($result)){
                            ?>
                                <option value="<?php echo $mostrar_cat[0]?>"><?php echo $mostrar_cat[1]?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcionproducto" class="col-sm-2 col-form-label">Descripcion</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="descripcion_producto" placeholder="Descripcion" name="descripcion_producto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidadproducto" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                        <input type="number" min="0" value="1" class="form-control" id="cantidad_producto" name="cantidad_producto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="precioproducto" class="col-sm-2 col-form-label">Precio</label>
                        <div class="col-sm-10">
                        <input type="number" min="0" value="0.00" step="0.01" class="form-control" id="precio_producto" name="precio_producto">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button id="btnGuardarProducto" class="btn btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-info">Limpiar</button>
                        </div>
                    </div>
                </form>
                </div>
            <div class="card-footer text-muted">
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
     


<div class="footer-copyright text-center py-3">  <div align="center"><ul class="social-icons" >
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


<!-- AGREGANDO PRODUCTO  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnGuardarProducto').click(function(){
            var datos=$('#formProductos').serialize();
            // alert(datos);
            // return false;
            $.ajax({
                type:"POST",
                url:"../procesos/producto/agregar_producto.php",
                data:datos,
                success:function(r){
                    if(r==1){
                        alertify.success("Producto registrado con exito");
                    }else{
                        alertify.error("NO SE PUDO REGISTRAR EL PRODUCTO");
                    }
                }
            });
            return false;
        });
    });
</script>

<!-- Cierre de la validacion de la session usuario -->
<?php } ?>