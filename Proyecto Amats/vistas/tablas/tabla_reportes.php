<?php
include_once"../../conexion/conexion.php";

//sentencia para conectar con conexion.php
 $conexion=conectar();

$sql="SELECT venta.id_venta, venta.nombre_cliente, venta.fecha_venta, productos.nombre_producto, venta.cantidad_venta, 
                    productos.precio_producto, (venta.cantidad_venta*productos.precio_producto)
            FROM venta
            INNER JOIN productos ON productos.id_producto = venta.fk_id_producto";

        $result=mysqli_query($conexion,$sql);
?>

<div class="table-responsive">
    <table class="table table-hover table-condensed display responsive no-wrap" id="id_tablaVentas">
        <thead class="cabecera_tablas">
            <tr>
                <td>Numero</td>
                <td>Cliente</td>
                <td>Fecha</td>
                <td>Producto</td>
                <td>Cantidad</td>
                <td>Precio Unitario</td>
                <td>Monto total</td>
                <td>Eliminar</td>
            </tr> 
        </thead>
        <tbody>
            <?php
                while($venta=mysqli_fetch_row($result)){      
            ?>
            <tr>
                <td><?php echo $venta[0] ?></td>
                <td><?php echo $venta[1] ?></td>
                <td><?php echo $venta[2] ?></td>
                <td><?php echo $venta[3] ?></td>
                <td><?php echo $venta[4] ?></td>
                <td><?php echo "\$ $venta[5]"; ?></td>
                <td><?php echo "\$ $venta[6]"; ?></td>
                <td> <span class="btn btn-danger btn-xs" onclick="consultarEliminarVenta('<?php echo $venta[0] ?>')">
                <span><img src="../recursos/eliminar.png" class="icono_opciones"></span></span> 

                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot class="pie_tablas">
            <tr>
                <td>Numero</td>
                <td>Cliente</td>
                <td>Fecha</td>
                <td>Producto</td>
                <td>Cantidad</td>
                <td>Precio Unitario</td>
                <td>Monto total</td>
                <td>Eliminar</td>
            </tr>
        </tfoot> 
    </table>
</div>


<!-- SCRIPT PARA APLICAR FORMATO DATATABLE  -->
<script type="text/javascript">
        $(document).ready(function() {
            $('#id_tablaVentas').DataTable({
                "language": idioma_espanol
            });
        
        }
        );

        var idioma_espanol={
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
}
</script>