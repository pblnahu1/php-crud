<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTI - Inicio</title>
    <link rel="icon" href="assets/img/icono.png">
    <link rel="stylesheet" href="assets/css/styles-inicio.css">
    <link rel="stylesheet" href="assets/css/encabezado.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/loader.css">
    <!-- <link rel="stylesheet" href="assets/css/material.min.css"> -->
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- iconos fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet"> -->
</head>

<body>
    <?php include("conexion.php"); ?>
    <header id="header">
        <a href="index.php">
            <div class="div-img-header"><img src="assets/img/icono.png" alt="icono-header"></div>
        </a>
        <button class="abrir-menu" id="abrir"><i class="fa fa-bars"></i></button>
        <ul id="nav" class="nav-bar">
            <button class="cerrar-menu" id="cerrar"><i class="fa fa-window-close"></i></button>
            <li><a class="nav-link" href="index.php">Inicio</a></li>
            <li><a class="nav-link link-cerrar-sesion" href="cerrar_sesion.php" onclick="return confirm('¿Desea Cerrar Sesión?')">Cerrar Sesión</a></li>
        </ul>
    </header>

    <div id="demo-content">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <div id="content"> </div>
    </div>

    <main>
        <?php
        // ob_start();
        session_start();

        if (isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_usuario'])) {
            $nombreUsuario = $_SESSION['nombre_usuario'];
            $apellidoUsuario = $_SESSION['apellido_usuario'];
        ?>
            <div class="div-text">
                <h3 class="welcome-h3">¡Bienvenid@ <?php echo $nombreUsuario . " " . $apellidoUsuario; ?>!</h3>
            </div>
        <?php
        } else {
        ?>
            <div class="div-text">
                <h3 class="error-h3">Ha ocurrido un error. Email o Contraseña son inválidos.</h3>
            </div>
        <?php
        }
        ?>
        <br>
        <div class="container">
            <div class="row">
                <form action="descargar-pdf.php" method="POST" accept-charset="utf-8">
                    <a href="registro.php" class="btn btn-outline-dark px-5 py-3 botones-tabla boton-registrar-nuevo-usuario">Registrar nuevo usuario</a>
                    
                    <button type="submit" class="btn px-5 py-3 botones-tabla boton-descargar-pdf">Descargar PDF</button>
                    
                    <a href="descargar-excel.php" class="btn px-5 py-3 botones-tabla boton-descargar-excel" target="_blank">Descargar Excel</a>

                    <div class="div-filtros">
                        <div class="filtro">
                            <input type="date" name="fecha_ingreso" class="form-control" placeholder="Fecha de Inicio" required>
                        </div>
                        <div class="filtro">
                            <input type="date" name="fechaFin" class="form-control" placeholder="Fecha Final" required>
                        </div>
                        <div class="filtro">
                            <span id="filtro" class="btn px-5 botones-tabla boton-filtrar">Filtrar</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12 text-center mt-5">
            <span id="loaderFiltro"> </span>
        </div>

        <br>
        <div class="container resultadoFiltro">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered" id="tableUsers">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Email</th>
                                <th scope="col">Clave</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">Fecha Registro</th>
                                <th scope="col" class="th-editar-registro">Editar</th>
                                <th scope="col" class="th-borrar-registro">Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM datos_usuarios";
                            $resultado = mysqli_query($conexion, $query);
                            // Mientras obtengo las filas de $resultado (con la consulta SQL) como un array
                            while ($row = mysqli_fetch_assoc($resultado)) { ?>
                                <tr>
                                    <td><?php echo $row['id_usuario']; ?></td>
                                    <td><?php echo $row['nombre_usuario']; ?></td>
                                    <td><?php echo $row['apellido_usuario']; ?></td>
                                    <td><?php echo $row['edad_usuario']; ?></td>
                                    <td><?php echo $row['email_usuario']; ?></td>
                                    <td><?php echo $row['clave_usuario']; ?></td>
                                    <td><?php echo $row['provincia_usuario']; ?></td>
                                    <td><?php echo $row['fecha_ingreso']; ?></td>
                                    <td class="td-editar-registro">
                                        <a href="editar_datos.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="btn btn-default">
                                            <i class="fas fa-solid fa-marker"></i>
                                        </a>
                                    </td>
                                    <td class="td-borrar-registro">
                                        <a href="borrar_datos.php?id_usuario=<?php echo $row['id_usuario']; ?>" onclick="return confirm('Realmente desea eliminar?')" class="btn btn-default">
                                            <i class="fas fa-solid fa-trash" style="color:red;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <div class="item">
                <span class="location-span">Buenos Aires, Argentina</span>
                <br>
                <a href="https://www.instagram.com" class="social-icon"><i class="fab fa-instagram"></i> Instagram</a>
                <a href="https://www.x.com" class="social-icon"><i class="fab fa-twitter"></i> Twitter</a>
                <br>
                <a href="https://www.facebook.com" class="social-icon"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="https://www.youtube.com" class="social-icon"><i class="fab fa-youtube"></i> Youtube</a>
            </div>
            <div class="item">
                <span class="privacidad-span">Esta página respeta tu privacidad y se compromete a proteger la información personal que compartes con nosotros. Consulta nuestra política de privacidad para obtener más detalles sobre cómo manejamos y utilizamos tus datos.</span>
            </div>
        </div>
    </footer>
    <!-- Al hacer click en el boton atrás del Navegador, vuelve al index.php y no permite volver a la pagina donde se encuentran todos los datos de los usuarios registrados una vez cerrada la sesión. Al actualizar (F5) la página recien mencionada, no permite volver si te olvidaste de cerrar sesión, cosa que no debe pasar (solucionar eso) -->
    <!-- <script src="assets/js/boton-atras-pagina-inicio.js"></script> -->
    <script src="assets/js/menu-nav.js"></script>

    <!-- FILTRADO y el CARGANDO PÁGINA-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            setTimeout(function() {
                $('body').addClass('loaded');
            }, 1000);


            //FILTRANDO REGISTROS
            $("#filtro").on("click", function(e) {
                e.preventDefault();

                loaderF(true);

                var f_ingreso = $('input[name=fecha_ingreso]').val();
                var f_fin = $('input[name=fechaFin]').val();
                console.log(f_ingreso + '' + f_fin);

                if (f_ingreso != "" && f_fin != "") {
                    $.post("filtro.php", {
                        f_ingreso,
                        f_fin
                    }, function(data) {
                        $("#tableUsers").hide();
                        $(".resultadoFiltro").html(data);
                        loaderF(false);
                    });
                } else {
                    $("#loaderFiltro").html('<p style="color:red;  font-weight:bold;">Debe seleccionar ambas fechas</p>');
                }
            });

            function loaderF(statusLoader) {
                console.log(statusLoader);
                if (statusLoader) {
                    $("#loaderFiltro").show();
                    $("#loaderFiltro").html('<img class="img-fluid" src="assets/img/cargando.svg" style="left:50%; right: 50%; width:50px;">');
                } else {
                    $("#loaderFiltro").hide();
                }
            }
        });
    </script>
</body>

</html>