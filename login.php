<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTWS Login</title>
    <link rel="icon" href="imagenes/icono-pestañas.png">
    <link rel="stylesheet" href="css/styles-login.css">
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
    <header id="header">
        <a class="header-link" href="index.php">NTWS</a>
        <nav id="nav-bar">
            <a class="nav-link" href="index.php">Inicio</a>
            <a class="nav-link" href="#">Contactos</a>
            <a class="nav-link" href="proteccion-datos/privacidad.php">Política de Privacidad</a>
        </nav>
    </header>
    <main>
        <?php
        session_start();

        include("conexion.php");

        if (isset($_POST['enviar-login'])) {
            $emailUser = $_POST['email'];
            $claveUser = $_POST['clave'];

            $consulta = "SELECT nombre_usuario, apellido_usuario FROM datos_usuarios WHERE email_usuario = '$emailUser' AND clave_usuario = '$claveUser'";

            $respuesta = mysqli_query($conexion, $consulta);

            $fila = mysqli_fetch_assoc($respuesta);

            if ($fila) {
                $_SESSION['nombre_usuario'] = $fila['nombre_usuario'];
                $_SESSION['apellido_usuario'] = $fila['apellido_usuario'];
                header('Location: pagina-inicio.php');
                exit();
            } else {
        ?>
                <h3 style="text-align:center; color:red;">Ha ocurrido un error. Email o Contraseña son inválidos.</h3>
        <?php
            }
        }
        ?>
        <div class="container">
            <div class="text-h2-form">
                <h1 class="h1-text">Inicia Sesión para acceder a todo tu contenido!</h1>
                <hr>
                <h5>Si no tienes una cuenta <a href="registro.php" class="btn btn-outline-dark">crea una nueva</a></h5>
                <div class="social-icons">
                    <a href="https://www.instagram.com" class="social-icon-login"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.x.com" class="social-icon-login"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com" class="social-icon-login"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.youtube.com" class="social-icon-login"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="container-form">
                <form action="login.php" method="post">
                    <label for="lbl-name-uss">Email(*)<input type="text" name="email" id="lbl-name-uss" required></label>
                    <label for="lbl-contrasñea">Contraseña(*)<input type="password" name="clave" id="lbl-contraseña" required></label>
                    <input type="submit" name="enviar-login" value="Iniciar Sesión">
                </form>
                <br>
                <p><a href="#">¿Olvidaste tu contraseña?</a></p>
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