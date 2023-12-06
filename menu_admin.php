<?php
  include "php/conexion_be.php";

  // Consulta SQL para seleccionar las columnas deseadas de ambas tablas
  $result = $conexion->query("SELECT usuario.ci, usuario.nombre, usuario.correo, usuario.rol, usuario.facultad, usuario.carrera, categoria.categoria, categoria.fecha_uso FROM usuario JOIN categoria ON usuario.ci = categoria.ci");

  // Almacenar los resultados en un array
  $data = array();
  if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="images/logo_p.png" rel="icon">
    <link href="images/logo_p.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Registro Usuario - Biblioteca</title>
      <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-size: 11px;
        }
        body {
          margin: 0;
          padding: 0;
          background-image: url('images/fondo_utc_1.jpg');
          background-position: center 250%;
          background-repeat: no-repeat;
          background-size: cover;
        }
        /* Estilos para el menú */
        .menu {
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          display: flex;
          justify-content: space-between;
          align-items: center;
          background-image: url('images/fondo_utc_1.jpg');
          color: white;
          padding: 2px;
          width: 100%;
          z-index: 1; /* Add this line */
        }

        /* Estilos para el logo */
        .logo {
          width: 150px;
          height: 50px;
          background-image: url('images/logo_i_a.png');
          background-size: cover;
          /*border: 2px solid white;*/
        }
        /* Estilos para el botón */
        .boton {
          background-color: #123087;
          color: white;
          border: none;
          padding: 10px 10px;
          border-radius: 15px;
          font-weight: bold;
          cursor: pointer;
          margin-right: 20px;
          font-size: 16px;
        }
        .boton:hover {
          color: #D6D3D3;
        }
        .pri{
          background-image: url('images/fondo_utc_1.jpg');
        }
        table {
          border-collapse: collapse;
          width: 100%;
          background-color: white; /* Establece el fondo de la tabla en blanco */
        }

        th, td {
          border: 1px solid #123087; /* Establece el color del borde de las celdas */
          padding: 8px;
          text-align: left;
        }

        tr:nth-child(even) {
          background-color: #f2f2f2; /* Establece un color alternativo para las filas pares */
        }
        .data_table {
          margin-top: 100px; /* Ajusta este valor según la altura del mini menú */
        }
      </style>
</head>
<body>
    <!-- Menú -->
    <div class="menu">
        <div class="logo"></div>
        <a class="boton" href="php/cerrar_sesion.php">Cerrar</a>
    </div>

    <div class="pri">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="data_table">
                      <table id="example" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th style="background-color: #123087; color: white;">CI</th>
                              <th style="background-color: #123087; color: white;">Nombre</th>
                              <th style="background-color: #123087; color: white;">Correo</th>
                              <th style="background-color: #123087; color: white;">Usuario</th>
                              <th style="background-color: #123087; color: white;">Facultad</th>
                              <th style="background-color: #123087; color: white;">Carrera</th>
                              <th style="background-color: #123087; color: white;">Servicio</th>
                              <th style="background-color: #123087; color: white;">Fecha</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($data as $row): ?>
                              <tr>
                                <td><?= $row['ci'] ?></td>
                                <td><?= $row['nombre'] ?></td>
                                <td><?= $row['correo'] ?></td>
                                <td><?= $row['rol'] ?></td>
                                <td><?= $row['facultad'] ?></td>
                                <td><?= $row['carrera'] ?></td>
                                <td><?= $row['categoria'] ?></td>
                                <td><?= $row['fecha_uso'] ?></td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
    
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>