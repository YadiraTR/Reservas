<?php

   $host = 'localhost';
   $usuario_local = 'root';
   $clave = '12345';
   $base_de_datos = 'reservas';

   $conection = @mysqli_connect($host,$usuario_local,$clave,$base_de_datos);
   $conexion = new mysqli("localhost","root","12345","reservas");
   if(!$conection)
   {
   	echo "Error en la conexion";
   }
   else
   {
    
   }
   

?>