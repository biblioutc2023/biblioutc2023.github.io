<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location: index.php");
        session_destroy();
        exit();
    }
    $User=$_SESSION['usuario'];
    include "php/conexion_be.php";
    $result = mysqli_query($conexion, "SELECT nombre FROM usuario WHERE ci='$User'");
    while ($row = mysqli_fetch_assoc($result)) {
        $User=$row['nombre']."<br>";
    }
    mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <link href="images/logo_p.png" rel="icon">
    <link href="images/logo_p.png" rel="apple-touch-icon">
    <title>Servicios UTC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link href="css/estilo.css" rel="stylesheet" />

</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Biblioteca UTC</a>
                <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="php/cerrar_sesion.php">Cerrar Sesion</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Actividades-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Bienvenid@ <?php echo $User; ?> a la Biblioteca</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">¿Qué servicio vas a utilizar?</p>
                        <a class="btn btn-primary btn-xl" href="#servicios">Ver más</a>
                    </div>
                </div>
            </div>
        </header>
        <section class="image-section" id="servicios">
            <div class="contenedor-imagenes">
                <div class="imagen" style="background-image: url('images/Sala_Lectura.jpeg');">
                    <button class="boton-imagen" onclick="window.location.href='php/cerrar_sesion_u.php'">Seleccionar</button>
                </div>
                <div class="imagen" style="background-image: url('images/S2.jpeg');">
                    <button class="boton-imagen" onclick="window.location.href='php/cerrar_sesion_d.php'">Seleccionar</button>
                </div>
                <div class="imagen" style="background-image: url('images/S3.jpeg');">
                    <button class="boton-imagen" onclick="window.location.href='php/cerrar_sesion_t.php'">Seleccionar</button>
                </div>
            </div>
        </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>    
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Biblioteca UTC</div></div>
    </footer>
</body>
</html>
