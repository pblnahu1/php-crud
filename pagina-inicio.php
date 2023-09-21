<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTWS - Inicio</title>
    <link rel="icon" href="imagenes/icono-pestañas.png">
    <link rel="stylesheet" href="css/styles-inicio.css">
    <link rel="stylesheet" href="css/encabezado.css">
    <link rel="stylesheet" href="css/footer.css">
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
        <a class="header-link" href="index.php">NTWS</a>
        <nav id="nav-bar">
            <a class="nav-link" href="index.php">Inicio</a>
            <a class="nav-link" href="publicaciones.html">Productos</a>
            <a class="nav-link" href="#">Contactos</a>
            <a class="nav-link link-cerrar-sesion" href="cerrar_sesion.php" onclick="return confirm('¿Desea Cerrar Sesión?')">Cerrar Sesión</a>
        </nav>
    </header>
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
                <h3 class="error-h3" style="text-align:center; color:red;">Ha ocurrido un error. Email o Contraseña son inválidos.</h3>
            </div>
        <?php
        }
        ?>
        <br>
        <div class="container">
            <a href="registro.php" class="btn btn-outline-dark px-5 py-3">Registrar nuevo usuario</a>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="col-1">ID</th>
                                <th class="col-2">Nombre</th>
                                <th class="col-1">Apellido</th>
                                <th class="col-2">Edad</th>
                                <th class="col-1">Email</th>
                                <th class="col-2">Clave</th>
                                <th class="col-1">Provincia</th>
                                <th class="col-2">Fecha Registro</th>
                                <th class="col-1">Editar</th>
                                <th class="col-2">Borrar</th>
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
                                    <td>
                                        <a href="editar_datos.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="btn btn-default">
                                            <i class="fas fa-solid fa-marker"></i>
                                        </a>
                                    </td>
                                    <td>
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
</body>

</html>