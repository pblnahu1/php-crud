<?php

include("conexion.php");

// creo las variables donde se almacenarán los datos editados
$nombre = '';
$apellido = '';
$edad = '';
$email = '';
$clave = '';
$provincia = '';

// obtengo el 'id' al q se desea editar y verifico si existen las filas
if (isset($_GET['id_usuario'])) {
    $id = $_GET['id_usuario'];
    $sql = "SELECT * FROM datos_usuarios WHERE id_usuario=$id";
    $resultado = mysqli_query($conexion, $sql);

    // si la consulta funciona y si encontró un único registro q coincida (true)
    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $nombre = $row['nombre_usuario'];
        $apellido = $row['apellido_usuario'];
        $edad = $row['edad_usuario'];
        $email = $row['email_usuario'];
        $clave = $row['clave_usuario'];
        $provincia = $row['provincia_usuario'];
    }
}

// botón actualizar con el 'UPDATE nom_tabla SET nom_col WHERE condicion' de SQL
if (isset($_POST['actualizar'])) {
    $id = $_GET['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $provincia = $_POST['provincia'];

    $sql = "UPDATE datos_usuarios SET nombre_usuario = '$nombre', apellido_usuario = '$apellido', edad_usuario = '$edad', email_usuario = '$email', clave_usuario = '$clave', provincia_usuario = '$provincia' WHERE id_usuario='$id'";

    mysqli_query($conexion, $sql);

    header('Location: pagina-inicio.php');
}

// boton para cancelar, almaceno mensajes con variables de session
if (isset($_POST['cancelar'])) {
    $_SESSION['message'] = 'Salir sin guardar';
    $_SESSION['message_type'] = 'No se modificó';
    header('Location: pagina-inicio.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
    <link rel="stylesheet" href="css/encabezado.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- iconos fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet"> -->
    <style>
        label {
            /* font-size: 1.2em; */
            font-weight: 700;
        }
    </style>
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
    <div class="container mt-3">
        <h3 style="text-align:center; margin:0; color:crimson;">Editar Usuario</h3>
    </div>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editar_datos.php?id_usuario=<?php echo $_GET['id_usuario']; ?>" method="POST">
                        <!-- Nombre -->
                        <div class="form-group py-3">
                            <label for="lbl-nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="lbl-nombre" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombre">
                        </div>
                        <!-- Apellido -->
                        <div class="form-group py-3">
                            <label for="lbl-apelido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" id="lbl-apellido" class="form-control" value="<?php echo $apellido; ?>" placeholder="Actualizar Apellido">
                        </div>
                        <!-- Edad -->
                        <div class="form-group py-3">
                            <label for="lbl-edad" class="form-label">Edad</label>
                            <input type="number" min="17" max="99" name="edad" id="lbl-edad" class="form-control" value="<?php echo $edad; ?>" placeholder="Actualizar Edad">
                        </div>
                        <!-- Email -->
                        <div class="form-group py-3">
                            <label for="lbl-email" class="form-label">Email</label>
                            <input type="text" name="email" id="lbl-email" class="form-control" value="<?php echo $email; ?>" placeholder="Actualizar Email">
                        </div>
                        <!-- Clave -->
                        <div class="form-group py-3">
                            <label for="lbl-clave" class="form-label">Contraseña</label>
                            <input type="text" name="clave" id="lbl-clave" class="form-control" value="<?php echo $clave; ?>" placeholder="Actualizar Contraseña">
                        </div>
                        <!-- Provincia -->
                        <div class="form-group py-3">
                            <label for="lbl-provincia" class="form-label">Provincia</label>
                            <select id="lbl-provincia" class="form-select" name="provincia" value="<?php echo $provincia; ?>">
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
                        </div>
                        <br>
                        <button class="btn container btn-primary fs-5" name="actualizar">Actualizar</button>
                        <br><br>
                        <button class="btn container btn-danger fs-5" name="cancelar">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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