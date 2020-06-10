<?php 

   include_once"../../conexion/conexion.php";
   //sentencia para conectar con conexion.php
    $conexion=conectar();
//


        $sql="SELECT id_usuario, nombre_usuario, password_usuario, fk_id_rol  
                from usuario";
        $result=mysqli_query($conexion,$sql);
 ?>

<div>
    <table class="table table-hover table-condensed table-responsive-sm table-bordered" id="id_tablaUsuario">
        <thead class="cabecera_tablas">
            <tr>
                <td>Nombre Usuario</td>
                <td>Contraseña</td>
                <td>Editar</td>
                <td>Eliminar</td>
                
            </tr> 
        </thead>
        <tbody>

            <?php 
            while($usuario=mysqli_fetch_row($result)){
                $datos= $usuario[0].'||'.
                        $usuario[1].'||'.
                        $usuario[2].'||'.
                        $usuario[3];
         ?>

        <tr>
            <td><?php Echo $usuario[1] ?></td>
            <td><?php Echo $usuario[2]?></td>
            
                <td> <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalEditar" 
                onclick="agregarform('<?php echo $datos ?>')"><span><img src="../recursos/editar.png" class="icono_opciones" ></span></span> 
                            
                </td>
                <td> <span class="btn btn-danger btn-xs" onclick="consultarEliminarUsuario('<?php echo $usuario[0] ?>')"><span><img src="../recursos/eliminar.png" class="icono_opciones"></span></span> 
        </tr>
    <?php 
    }
     ?>

                </td>
            </tr>
        </tbody>
        <tfoot class="pie_tablas">
            <tr>
                <td>Nombre Usuario</td>
                <td>Contraseña</td>
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