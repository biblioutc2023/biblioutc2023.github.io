<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: menu_u.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
        select {
          font-size: 16px;
          font-family: 'Roboto', sans-serif;
          border: none;
          background: #123087; 
          color: white;
          width: 100%;
          height: 40px;
        }
        .centrar {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%;
        }
      </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="images/logo_p.png" rel="icon">
    <link href="images/logo_p.png" rel="apple-touch-icon">
    <title>Login y Register - Biblioteca</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¡Ya te haz registrado!</h3>
                        <p>Inicia para registar tu servicio</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>Biblioteca Para Todos</h3>
                        <p>Regístra tus datos</p>
                        <button id="btn__registrarse">Regístrarte</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                        <img class="centrar" src="images/logo_i.png" alt="UTC" width="100" height="70">
                        <br>
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo" name="correo" required autofocus>
                        <input type="password" placeholder="Cedula" name="ci" required autofocus>
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                      <img class="centrar" src="images/logo_i.png" alt="UTC" width="100" height="60">
                      <br>
                      <h2>Regístrarse</h2>
                      <input type="text" placeholder="Cedula" name="cedula" required autofocus>
                      <input type="text" placeholder="Nombre Y Apellido" name="nombre" required autofocus>
                      <br>
                      <br>
                      <select id="rol" name="rol">
                        <option value="Externo">&nbsp;&nbsp;&nbsp; Externo</option>
                        <option value="Administrativo">&nbsp;&nbsp;&nbsp; Administrativo</option>
                        <option value="Trabajadores">&nbsp;&nbsp;&nbsp; Trabajadores</option>
                        <option value="Estudiante">&nbsp;&nbsp;&nbsp; Estudiante</option>
                        <option value="Docente">&nbsp;&nbsp;&nbsp; Docente</option>
                      </select>
                      <input type="text" placeholder="Correo" name="correo" required autofocus>
                      <br>
                      <br>
                      <select id="facultad" name="facultad">
                        <option value="">&nbsp;&nbsp;&nbsp; Seleccione una Facultad</option>
                      </select>
                      <br>
                      <br>
                      <select id="carrera" name="carrera">
                        <option value="">&nbsp;&nbsp;&nbsp; Seleccione una Carrera</option>
                      </select>
                      <button>Regístrarse</button>
                    </form>
                    <script>
                        // Obtener los elementos de los combo box
                        const rol = document.getElementById("rol");
                        const facultad = document.getElementById("facultad");
                        const carrera = document.getElementById("carrera");

                        // Definir las opciones para cada combo box
                        const opcionesFacultad = {
                            Docente: ["Facultad de Ciencias Agropecuarias y Recursos Naturales (CAREN)", "Facultad de Ciencias de la Ingeniera y Aplicadas (CIYA)", "Facultad de Ciencias Administrativas y Economicas (CAYE)", "Facultad de Ciencias Sociales Artes y Educacion (CSAYE)", "Extension Pujili", "Extension La Mana"],
                            Estudiante: ["Facultad de Ciencias Agropecuarias y Recursos Naturales (CAREN)", "Facultad de Ciencias de la Ingeniera y Aplicadas (CIYA)", "Facultad de Ciencias Administrativas y Economicas (CAYE)", "Facultad de Ciencias Sociales Artes y Educacion (CSAYE)", "Extension Pujili", "Extension La Mana"]
                        };

                        const opcionesCarrera = {
                            "Facultad de Ciencias Agropecuarias y Recursos Naturales (CAREN)": ["Agroindustrial", "Veterinaria", "Agronomia", "Ambiente", "Turismo", "Agropecuarias", "Biotecnologia"],
                            "Facultad de Ciencias de la Ingeniera y Aplicadas (CIYA)": ["Sistemas de Informacion", "Electromecanica", "Industrial", "Electricidad", "Hidraulica"],
                            "Facultad de Ciencias Administrativas y Economicas (CAYE)": ["Contabilidad y Auditoria", "Gestion de la Información Gerencial", "Administracion de Empresas", "Mercadotecnia", "Gestion del Talento Humano", "Economia"],
                            "Facultad de Ciencias Sociales Artes y Educacion (CSAYE)": ["Diseño Grafico", "Comunicacion", "Trabajo Social", "Animacion Digital"],
                            "Extension La Mana": ["Contabilidad_LM", "Administracion_LM", "Electromecanica_LM", "Sistemas de Informacion_LM", "Turismo_LM", "Agronomia_LM", "Agroindustrias_LM"],
                            "Extension Pujili": ["Educacion Inicial", "Educacion Basica", "Pedagogia del Idioma Ingles", "Pedagogia de la Lengua y Literatura", "Pedagogia de las Matematicas y la Fisica"]
                        };

                        // Función para actualizar las opciones de la facultad
                        function actualizarFacultad() {
                            // Agregar los eventos para actualizar las opciones de los combo box
                            if (rol.value === "Externo") {
                                facultad.innerHTML = "<option value=''>&nbsp;&nbsp;&nbsp; Seleccione una Facultad</option>";
                                carrera.innerHTML = "<option value=''>&nbsp;&nbsp;&nbsp; Seleccione una Carrera</option>";
                            }else{
                                // Obtener las opciones correspondientes al rol seleccionado
                                const opciones = opcionesFacultad[rol.value];

                                // Limpiar las opciones anteriores
                                facultad.innerHTML = "<option value=''>&nbsp;&nbsp;&nbsp; Seleccione una opción</option>";

                                // Agregar las nuevas opciones
                                opciones.forEach((opcion) => {
                                    const elemento = document.createElement("option");
                                    elemento.value = opcion;
                                    elemento.textContent = "\u00A0\u00A0\u00A0" + opcion;
                                    facultad.appendChild(elemento);
                                });

                                // Actualizar las opciones de la carrera
                                actualizarCarrera();
                            }
                        }

                      // Función para actualizar las opciones de la carrera
                      function actualizarCarrera() {
                        // Obtener las opciones correspondientes a la facultad seleccionada
                        const opciones = opcionesCarrera[facultad.value];

                        // Limpiar las opciones anteriores
                        carrera.innerHTML = "<option value=''>&nbsp;&nbsp;&nbsp; Seleccione una opción</option>";

                        // Agregar las nuevas opciones
                        opciones.forEach((opcion) => {
                          const elemento = document.createElement("option");
                          elemento.value = opcion;
                          elemento.textContent = "\u00A0\u00A0\u00A0" + opcion;
                          carrera.appendChild(elemento);
                        });
                      }

                      // Agregar los eventos para actualizar las opciones de los combo box
                      rol.addEventListener("change", actualizarFacultad);
                      facultad.addEventListener("change", actualizarCarrera);
                    </script>
                </div>
            </div>
      </main>
      <script src="js/script.js"></script>
</body>
</html>