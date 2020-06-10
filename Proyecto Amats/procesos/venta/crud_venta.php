<?php
include_once"../../conexion/conexion.php";
	$conexion=conectar();
	
	//es mandada a llamar para agregar usuario
	
		class crud{
			public function agregar($datos){
				$conexion=conectar();

				$sql="INSERT INTO venta (nombre_cliente, fecha_venta, fk_id_producto, cantidad_venta)
                VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')
                ";

				$result= mysqli_query($conexion,$sql);
				
				self::restar_producto($datos[2], $datos[3]);

				return $result;
			}

			public function eliminar($id_venta){
				$conexion=conectar();

				$sql=" DELETE FROM venta 
                    WHERE id_venta = '$id_venta'
        		";

				return mysqli_query($conexion, $sql);

			}

			public function restar_producto($producto, $cantidad_venta){
				$conexion=conectar();
			
				$sql="SELECT cantidad_producto 
						from productos
						where id_producto='$producto'
				";
			
				$resultado=mysqli_query($conexion,$sql);

				$cantidad1=mysqli_fetch_row($resultado)[0];

				$cantidad_nueva=($cantidad1 - $cantidad_venta);

				$actualizacion= "UPDATE productos set cantidad_producto = '$cantidad_nueva'
				where id_producto = '$producto'
				";

				mysqli_query($conexion, $actualizacion);

			}

		}



?>