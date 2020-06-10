<?php

//funcion conexion

function conectar(){
	$server="localhost";
	$user="root";
	$pass="";
	$bd="sistema_ventas";

	$conexion=mysqli_connect($server,$user,$pass,$bd);

	return $conexion;
}

?>

