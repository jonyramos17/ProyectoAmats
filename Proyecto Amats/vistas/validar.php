<?php
session_start();
include_once"../conexion/conexion.php";
$conexion=conectar();

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];



$_SESSION['usuario']=$usuario;
$_SESSION['clave']=$clave;

//conecta a la base de datos


   $consulta="SELECT count(*) as contar  from usuario WHERE nombre_usuario='$usuario' and password_usuario='$clave'";
   $resultado=mysqli_query($conexion, $consulta);

   $array = mysqli_fetch_array($resultado);

   if ($array['contar']>0) {
      header("location: inicio.php");
   }else {
      echo "
      <script type='text/javascript'>
      alert('Usuario o contraseña incorrectos!');
      window.location.href='login.html'
      </script>
      ";
   }

?>

