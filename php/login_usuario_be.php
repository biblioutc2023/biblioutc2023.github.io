<?php
	session_start();

	include "conexion_be.php";

	$correo = $_POST['correo'];
	$contra = $_POST['ci'];

	$validar_login = mysqli_query($conexion,"SELECT * FROM usuario WHERE correo='$correo' and clave='$contra'");
	$validar_login_ad = mysqli_query($conexion,"SELECT * FROM admin WHERE correo='$correo' and clave='$contra'");
	if(mysqli_num_rows($validar_login_ad)>0){
		$_SESSION['usuario']=$contra;
		header("location: ../menu_admin.php");
		exit();
	}else{
		if(mysqli_num_rows($validar_login)>0){
			$_SESSION['usuario']=$contra;
			header("location: ../menu_u.php");
			exit();
		}else{
			echo '<script>
					window.location = "../index.php"
				</script>"';
			exit();
		}
	}
?>