<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTI Login</title>
    <link rel="icon" href="assets/img/icono.png">
    <link rel="stylesheet" href="assets/css/styles-login.css">
    <link rel="stylesheet" href="assets/css/encabezado.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- iconos fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet"> -->
</head>

<body>
    <header id="header">
        <a href="index.php">
            <div class="div-img-header"><img src="assets/img/icono.png" alt="icono-header"></div>
        </a>
        <button class="abrir-menu" id="abrir"><i class="fa fa-bars"></i></button>
        <ul id="nav" class="nav-bar">
            <button class="cerrar-menu" id="cerrar"><i class="fa fa-window-close"></i></button>
            <li><a class="nav-link" href="index.php">Inicio</a></li>
        </ul>
    </header>
    <main>
        <?php
        session_start();

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
                <div class="div-error-sesion">
                    <p class="msg-error-inicio-sesion txt-p">Ha ocurrido un error. Email o Contraseña son inválidos.</p>
                    <button class="btn btn-danger" id="cerrar-ventana"><i class="fas fa-times"></i></button>
                </div>
            <?php
            }
        }

        // verifico si existe el mensaje en la variable session y lo muestro
        if (isset($_SESSION['mensaje'])) { ?>
            <div class="div-boton-cerrar">
                <p class="msg-cerrar-sesion txt-p"><?php echo $_SESSION['mensaje']; ?></p>
                <button class="btn btn-danger" id="cerrar-ventana"><i class="fas fa-times"></i></button>
            </div>
        <?php
            // borro la variable de session al actualizar la página
            unset($_SESSION['mensaje']);
        }
        ?>
        <div class="container">
            <div class="text-h2-form">
                <h1 class="h1-text">Inicia Sesión para acceder a todo tu contenido!</h1>
                <hr>
                <h5>Si no tienes una cuenta <a href="registro.php" class="btn btn-outline-dark">Crea una nueva</a></h5>
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
    <script src="assets/js/menu-nav.js"></script>
    <script src="assets/js/cerrar-btn.js"></script>
    
</body>

</html>