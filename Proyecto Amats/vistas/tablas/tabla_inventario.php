<?php
include_once"../../conexion/conexion.php";

//sentencia para conectar con conexion.php
 $conexion=conectar();

$sql="SELECT productos.id_producto, productos.nombre_producto, productos.descripcion, productos.fk_id_categoria, categorias.nombre_categoria,
                productos.cantidad_producto, productos.precio_producto 
        FROM productos 
        INNER JOIN categorias ON productos.fk_id_categoria = categorias.id_categoria";

        $result=mysqli_query($conexion,$sql);
?>


<div class="table-responsive">
    <table class="table table-hover table-condensed display responsive no-wrap" id="id_tablaInventario">
        <thead class="cabecera_tablas">
            <tr>
                <td>Numero</td>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Categoria</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr> 
        </thead>
        <tbody>
            <?php
                while($inventario=mysqli_fetch_row($result)){
                    $datos= $inventario[0].'||'.
                        $inventario[1].'||'.
                        $inventario[3].'||'.
                        $inventario[2].'||'.
                        $inventario[5].'||'.
                        $inventario[6];
            ?>
        
                

            <?php 
                if($inventario[0]<=10){ 
            ?>
            <tr>
                <td class="tabla_centrado p_escaso"><?php echo $inventario[0] ?></td>
                <td class="tabla_centrado p_escaso"><?php echo $inventario[1] ?></td>
                
                <td class="tabla_centrado p_escaso"><?php echo $inventario[2] ?></td>
                <td class="tabla_centrado p_escaso"><?php echo $inventario[4] ?></td>
                <td class="tabla_centrado p_escaso"><?php echo $inventario[5] ?></td>
             
                <td class="tabla_centrado p_escaso"><?php echo "\$ $inventario[6]"; ?></td>
                 <td> <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#nuevoProductoU"
                onclick="agregarform('<?php echo $datos ?>')"><span><img src="../recursos/editar.png" class="icono_opciones"></span></span> </td>
                <td> <span class="btn btn-danger btn-xs" onclick="consultarEliminarProducto('<?php echo $inventario[0] ?>')"><span><img src="../recursos/eliminar.png" class="icono_opciones"></span> </span> </td>
            </tr>

            <?php }else if($inventario[0]>10){ ?>
            <tr>
                <td class="tabla_centrado"><?php echo $inventario[0] ?></td>
                <td class="tabla_centrado"><?php echo $inventario[1] ?></td>
                
                <td class="tabla_centrado"><?php echo $inventario[2] ?></td>
                <td class="tabla_centrado"><?php echo $inventario[4] ?></td>
                <td class="tabla_centrado"><?php echo $inventario[5] ?></td>
                <td class="tabla_centrado"><?php echo "\$ $inventario[6]"; ?></td>
                 <td> <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#nuevoProductoU"
                onclick="agregarform('<?php echo $datos ?>')"><span><img src="../recursos/editar.png" class="icono_opciones"></span></span> </td>
                <td> <span class="btn btn-danger btn-xs" onclick="consultarEliminarProducto('<?php echo $inventario[0] ?>')"><span><img src="../recursos/eliminar.png" class="icono_opciones"></span> </span> </td>
            </tr>
           <?php } 

            } ?>
            
        
                
        </tbody>



        <tfoot class="pie_tablas">
            <tr>
                <td>Numero</td>
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Categoria</td>
                <td>Cantidad</td>
                <td>Precio</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </tfoot> 
    </table>
</div>


<!-- SCRIPT PARA APLICAR FORMATO DATATABLE  -->
<script type="text/javascript">
        $(document).ready(function() {
            $('#id_tablaInventario').DataTable({
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


