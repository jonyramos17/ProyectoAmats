<?php

    include_once"../../conexion/conexion.php";
    //sentencia para conectar con conexion.php
    $conexion=conectar();

    $sql="SELECT detalle_venta.id_detalle, productos.nombre_producto ,detalle_venta.cantidad
    FROM detalle_venta
    INNER JOIN productos 
    ON productos.id_producto = detalle_venta.fk_id_producto
    ";
    $result=mysqli_query($conexion,$sql);
?>



<div>
    <table class="table table-hover table-condensed table-responsive-sm table-bordered" id="id_detalleVenta">
        <thead class="cabecera_tablas">
            <tr>
                <td>Id Detalle</td>
                <td>Nombre Producto</td>
                <td>Cantidad</td>
                <td>Editar</td>
                <td>Eliminar</td>
                
            </tr> 
        </thead>
        <tbody>
        <?php 
            while($detalle=mysqli_fetch_row($result)){
         ?>

        <tr>
            <td><?php Echo $detalle[0] ?></td>
            <td><?php Echo $detalle[1] ?></td>
            <td><?php Echo $detalle[2]?></td>
            
                <td> <span class="btn btn-warning btn-xs"><span><img src="../recursos/editar.png" class="icono_opciones"></span></span> 
                            
                </td>
                <td> <span class="btn btn-danger btn-xs"><span><img src="../recursos/eliminar.png" class="icono_opciones"></span></span> 
        </tr>
    <?php 
    }
     ?>

                </td>
            </tr>
        </tbody>
        <tfoot class="pie_tablas">
            <tr>
                <td>Id Detalle</td>
                <td>Nombre Producto</td>
                <td>Cantidad</td>
                <td>Editar</td>
                <td>Eliminar</td>
                
            </tr>
        </tfoot> 
    </table>
</div>


<!-- SCRIPT PARA APLICAR FORMATO DATATABLE  -->
<script type="text/javascript">
        $(document).ready(function() {
            $('#id_tablaInventario').DataTable();
        } );
</script>