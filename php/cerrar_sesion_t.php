<?php
	session_start();
	include "conexion_be.php";
	$categoria = "Sala De Trabajo Grupal";
	$ci = $_SESSION['usuario'];
	date_default_timezone_set("America/Guayaquil");
	$fecha = date("Y-m-d H:i:s");

	$query = "INSERT INTO categoria(ci,categoria,fecha_uso) VALUES ('$ci','$categoria','$fecha')";

	$ejecutar = mysqli_query($conexion,$query);
	mysqli_close($conexion);

	session_destroy();
	header("location: ../index.php")
?>