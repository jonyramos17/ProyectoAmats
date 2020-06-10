<!DOCTYPE html>
<html lang="en">
<head>

<?php

include_once"formato.php"; 
include_once"script.php";
include_once"../conexion/conexion.php";
$conexion=conectar();

session_start();
$usuario_activo=$_SESSION['usuario'];

if(!isset($usuario_activo)){
  header("location: login.html");
}else{

?>
<title>Inventario</title>

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
					    <h3>Inventario</h3>
  					</div>
  					<div class="card-body">
						
						<hr>
						<div id="tablaInventario">

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
  <!--VENTANA EMERGENTE DE EDITAR USUARIO -->

<!-- Modal -->
<div class="modal fade" id="nuevoProductoU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="post" id="formProductosU">
                    <div class="form-group row">
                    <input type="text" hidden="" id="idProducto" name="idProducto">
                        <label for="nombreproducto" class="col-sm-2 col-form-label">Nombre Producto</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre_productoU" placeholder="Nombre" name="nombre_productoU">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="categoriaproducto" class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                        <select name="categoria_productoU" class="form-control" id="categoria_productoU">
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
                        <input type="text" class="form-control" id="descripcion_productoU" placeholder="Descripcion" name="descripcion_productoU">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidadproducto" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                        <input type="number" min="0" value="1" class="form-control" id="cantidad_productoU" name="cantidad_productoU">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="precioproducto" class="col-sm-2 col-form-label">Precio</label>
                        <div class="col-sm-10">
                        <input type="number" min="0" value="0.00" step="0.01" class="form-control" id="precio_productoU" name="precio_productoU">
                        </div>
                    </div>

                  </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizarProducto">Actualizar</button>
      </div>
    </div>
  </div>
</div>




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
		$('#tablaInventario').load('tablas/tabla_inventario.php');
	});
</script>


<!-- AGREGAR DATOS A FORMULARIO EDITAR PARA ACTUALIZAR *    HAY PROBLEMA POR EL SELECT PROGRAMADO DE LAS CATEGORIAS       *-->
<script>
    function agregarform(datos){
      
      d=datos.split('||');

      $('#idProducto').val(d[0]);
      $('#nombre_productoU').val(d[1]);
      $('#categoria_productoU').val(d[2]);
      $('#descripcion_productoU').val(d[3]);
      $('#cantidad_productoU').val(d[4]);
      $('#precio_productoU').val(d[5]);
    
    } 

      $('#btnActualizarProducto').click(function(){

        datos=$('#formProductosU').serialize();
          
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/producto/actualizar_producto.php",
            success:function(r){
              if (r==1){
                $('#tablaInventario').load('tablas/tabla_inventario.php');
              alertify.success("Actualizado con exito");
            }
             else{
               alertify.error("Error al actualizar!");
             }
          }
            
        });


      })

  function consultarEliminarProducto(id){
  
  alertify.confirm('Eliminar Producto', 'Esta seguro que desea eliminar ese Producto', function(){ eliminarProducto(id) }
                , function(){ alertify.error('Se cancelo')});

  }

  function eliminarProducto(id){
      datos="id="+id;

      $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/producto/eliminar_producto.php",
            success:function(r){
              if(r==1){
                $('#tablaInventario').load('tablas/tabla_inventario.php');
                alertify.success("Producto eliminado");
              }else{
                alertify.error("No se pudo eliminar el producto");
              }
          }
            
        });

  }

</script>



<!-- Cierre de la validacion de la session usuario -->
<?php } ?>