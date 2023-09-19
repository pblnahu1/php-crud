<?php
session_start();
include("conexion.php");
if (isset($_POST['enviar-registro'])) {
    if (
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['apellido']) >= 1 &&
        strlen($_POST['edad']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['clave']) >= 1 &&
        strlen($_POST['provincia']) >= 1
    ) {

        $nombreUsuario = trim($_POST['nombre']);
        $apellidoUsuario = trim($_POST['apellido']);
        $edadUsuario = trim($_POST['edad']);
        $emailUsuario = trim($_POST['email']);
        $claveUsuario = trim($_POST['clave']);
        $provinciaUsuario = trim($_POST['provincia']);
        $fechaIngreso = date("Y/m/d");

        $consulta = "INSERT INTO datos_usuarios(nombre_usuario, apellido_usuario, edad_usuario, email_usuario, clave_usuario, provincia_usuario, fecha_ingreso) VALUES('$nombreUsuario', '$apellidoUsuario', '$edadUsuario', '$emailUsuario', '$claveUsuario', '$provinciaUsuario', '$fechaIngreso')";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            $_SESSION['nombre_usuario'] = $nombreUsuario;
            $_SESSION['apellido_usuario'] = $apellidoUsuario;
            header('Location: pagina-inicio.php');
            exit();
        } else {
?>
            <h3 style="text-align:center; color:red;">Rellene los campos.</h3>
<?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTWS Registro</title>
    <link rel="icon" href="imagenes/icono-pestañas.png">
    <link rel="stylesheet" href="css/styles-registro.css">
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
            <a class="nav-link" href="publicaciones.html">Productos</a>
            <a class="nav-link" href="#">Contactos</a>
            <a class="nav-link" href="proteccion-datos/privacidad.php">Política de Privacidad</a>
        </nav>
    </header>
    <main>
        <div class="texto-form">
            <h1 class="h1-texto">Crea tu cuenta</h1>
            <p class="p-texto">Para poder publicar, comprar y acceder a todas las ofertas que tenemos, primero tienes que crearte una cuenta.</p>
            <p class="p-texto">Si ya tienes una cuenta <a href="login.php" class="btn btn-outline-dark">Inicia Sesión</a></p>
            <p class="p-texto-privacidad"><a href="proteccion-datos/privacidad.php">La Protección de Datos y Tu Privacidad: Nuestro Compromiso</a></p>
        </div>
        <form action="registro.php" method="post">
            <fieldset>
                <label for="lbl-nombre">Nombre(*)<input type="text" name="nombre" id="lbl-nombre" required></label>
                <label for="lbl-apellido">Apellido(*)<input type="text" name="apellido" id="lbl-apellido" required></label>
                <label for="lbl-edad">Edad(*)<input type="number" min="17" max="99" name="edad" id="lbl-edad" required></label>
                <label for="lbl-email">Email(*)<input type="email" name="email" id="lbl-email" placeholder="example@gmail.com" required></label>
                <label for="lbl-clave">Crear contraseña(*)<input type="password" name="clave" id="lbl-clave" required></label>
                <label for="provincias">Provincia(*)</label>
                <select id="provincias" name="provincia" required>
                    <option value="">Selecciona una</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Catamarca">Catamarca</option>
                    <option value="Chaco">Chaco</option>
                    <option value="Chubut">Chubut</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Corrientes">Corrientes</option>
                    <option value="Entre Ríos">Entre Ríos</option>
                    <option value="Formosa">Formosa</option>
                    <option value="Jujuy">Jujuy</option>
                    <option value="La Pampa">La Pampa</option>
                    <option value="La Rioja">La Rioja</option>
                    <option value="Mendoza">Mendoza</option>
                    <option value="Misiones">Misiones</option>
                    <option value="Neuquén">Neuquén</option>
                    <option value="Río Negro">Río Negro</option>
                    <option value="Salta">Salta</option>
                    <option value="San Juan">San Juan</option>
                    <option value="San Luis">San Luis</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Santa Fe">Santa Fe</option>
                    <option value="Santiago del Estero">Santiago del Estero</option>
                    <option value="Tierra del Fuego">Tierra del Fuego</option>
                    <option value="Tucumán">Tucumán</option>
                </select>
            </fieldset>
            <br>
            <fieldset>
                <textarea name="comentario" id="comentario" cols="50" placeholder="Dejanos tu mensaje" style="height:130px; resize:none;"></textarea>
            </fieldset>
            <br>
            <input type="submit" name="enviar-registro" value="Crear cuenta">
        </form>
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