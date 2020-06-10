<?php 

    include_once"../../conexion/conexion.php";
    $conexion=conectar();


        $sql="SELECT * from categorias";
        $result=mysqli_query($conexion,$sql);
 ?>


<div>
    <table class="table table-hover table-condensed table-responsive-sm table-bordered" id="id_tablaCategoria">
        <thead class="cabecera_tablas">
            <tr>
                <td>Id Categoria</td>
                <td>Nombre Categoria</td>
                <td>Editar</td>
                <td>Eliminar</td>
                
            </tr> 
        </thead>
        <tbody>
            <tr>
               <?php 
            while($categoria=mysqli_fetch_row($result)){
                $datos= $categoria[0].'||'.
                        $categoria[1];
         ?>

        <tr>
            <td><?php Echo $categoria[0] ?></td>
            <td><?php Echo $categoria[1] ?></td>
            
                <td> <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#nuevaCategoriaU"
                onclick="agregarform('<?php echo $datos ?>')"><span><img src="../recursos/editar.png" class="icono_opciones"></span></span> 
                            
                </td>
                <td> <span class="btn btn-danger btn-xs" onclick="consultarEliminarCategoria('<?php echo $categoria[0] ?>')"><span><img src="../recursos/eliminar.png" class="icono_opciones"></span></span> 
        </tr>
    <?php 
    }
     ?>

                </td>
            </tr>
        </tbody>
        <tfoot class="pie_tablas">
            <tr>
                <td>Id Categoria</td>
                <td>Nombre Categoria</td>
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