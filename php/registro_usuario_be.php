<?php
	include "conexion_be.php";
	$cedula = $_POST['cedula'];
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];
	$rol = $_POST['rol'];
	$facultad = $_POST['facultad'];
	$carrera = $_POST['carrera'];
	date_default_timezone_set("America/Guayaquil");
	$fecha = date("Y-m-d H:i:s");

	if ($facultad == "" && $carrera == "") {
	    $facultad = "No Aplica";
	    $carrera = "No Aplica";
	}
	if($rol!="Externo" or $rol!="Administrativo" or $rol!="Trabajadores" or substr($correo, -11) === "@utc.edu.ec"){
		$query = "INSERT INTO usuario(ci,nombre,correo,clave,rol,facultad,carrera,fecha_registro) VALUES ('$cedula','$nombre','$correo','$cedula','$rol','$facultad','$carrera','$fecha')";

		$verificar_cedula = mysqli_query($conexion, "SELECT * FROM usuario WHERE ci='$cedula'");
		if (strlen($cedula) < 10) {
			echo '<script>
				window.location = "../index.php"
			</script>"';
			exit();
		}
		if (mysqli_num_rows($verificar_cedula) > 0){
			echo '<script>
				window.location = "../index.php"
			</script>"';
			exit();
		}

		$verificar_nombre = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo'");
		if (mysqli_num_rows($verificar_nombre) > 0) {
			echo '<script>
				window.location = "../index.php"
			</script>"';
			exit();
		}

		$ejecutar = mysqli_query($conexion,$query);

		if ($ejecutar) {
			session_start();
			$_SESSION['usuario']=$cedula;
			echo '<script>
				window.location = "../menu_u.php"
			</script>"';
		} else {
			echo '<script>
				window.location = "../index.php"
			</script>"';
		}
	}else{
		$query = "INSERT INTO usuario(ci,nombre,correo,clave,rol,facultad,carrera,fecha_registro) VALUES ('$cedula','$nombre','$correo','$cedula','$rol','$facultad','$carrera','$fecha')";

		$verificar_cedula = mysqli_query($conexion, "SELECT * FROM usuario WHERE ci='$cedula'");
		if (strlen($cedula) < 10) {
		    echo '<script>
		        window.location = "../index.php"
		    </script>"';
		    exit();
		}
		if (mysqli_num_rows($verificar_cedula) > 0) {
		    echo '<script>
		        window.location = "../index.php"
		    </script>"';
		    exit();
		}

		$verificar_nombre = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo'");
		if (mysqli_num_rows($verificar_nombre) > 0) {
		    echo '<script>
		        window.location = "../index.php"
		    </script>"';
		    exit();
		}

		$ejecutar = mysqli_query($conexion,$query);

		if ($ejecutar) {
		    session_start();
		    $_SESSION['usuario']=$cedula;
		    echo '<script>
		        window.location = "../menu_u.php"
		    </script>"';
		} else {
		    echo '<script>
		        window.location = "../index.php"
		    </script>"';
		}
	}
	mysqli_close($conexion);
	
?>