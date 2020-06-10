<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include_once"script.php";
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

</head>

<body class="body_todo">

<!-- Quedara abierto y se cierra en cada una de las vistas para mantener la estructura -->
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right panel_menu" id="sidebar-wrapper">
      <div class="sidebar-heading lema">Nathaly Closep</div>
      <div class="list-group list-group"><div class="espacio_menu"></div>
        <a href="inicio.php" class=" boton_menu"> <img src="../recursos/home.png" class="icono_menu" > Inicio</a>
        <a href="usuario.php" class=" boton_menu"> <img src="../recursos/usuario.png" class="icono_menu" > Usuarios</a>
        <a href="categoria.php" class=" boton_menu"> <img src="../recursos/categoria.png" class="icono_menu" > Categorias</a>
        <a href="registro_productos.php" class=" boton_menu"> <img src="../recursos/producto.png" class="icono_menu" > Registrar Producto</a>
        <a href="inventario.php" class=" boton_menu"> <img src="../recursos/inventario.png" class="icono_menu" > Inventario</a>
        <a href="registro_venta.php" class=" boton_menu"> <img src="../recursos/venta.png" class="icono_menu" > Registrar venta</a>
        <a href="reporte_venta.php" class=" boton_menu"> <img src="../recursos/reporte.png" class="icono_menu" > Reporte de ventas</a>
        <a href="salir.php" class=" boton_menu"> <img src="../recursos/cerrar.png" class="icono_menu" > Cerrar Sesion</a>

        <!--
        <div class="fecha_hora">
        <?php
         // date_default_timezone_set('America/El_Salvador');
          // $mes = array("Enero", "Febrero", "Marzo","Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre","Noviembre", "Diciembre");
          // $dia = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
          // echo $dia{date("N")-1}. " ".date("d"). " ". "de" . " ". $mes{date("m")-1}. " ".  "del" . " ". date("Y");
          //echo date("d/m/Y")." ". date("h:i a");
        ?>
        </div>-->
      </div>
    </div>
    <!-- Fin de sidebar -->


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>