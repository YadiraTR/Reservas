<?php 
include "../conexion.php";

$temperatura = $_GET['temp'];
$humedad = $_GET['hum'];

$query_insert = mysqli_query($conection,"INSERT INTO datos(latitud, longitud) VALUES ('$humedad', '$temperatura')");

?>