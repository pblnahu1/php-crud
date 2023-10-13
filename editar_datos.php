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
    <link rel="icon" href="assets/img/icono.png">
    <link rel="stylesheet" href="assets/css/encabezado.css">
    <link rel="stylesheet" href="assets/css/footer.css">
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
        <a class="header-link" href="index.php">NTI</a>
        <nav id="nav-bar">
            <a class="nav-link" href="index.php">Inicio</a>
        </nav>
    </header>
    <main>
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
                                <select id="lbl-provincia" class="form-select" name="provincia">
                                    <option value="">Selecciona una</option>
                                    <option value="Buenos Aires" <?php if ($provincia == 'Buenos Aires') echo 'selected'; ?>>Buenos Aires</option>
                                    <option value="Catamarca" <?php if ($provincia == 'Catamarca') echo 'selected'; ?>>Catamarca</option>
                                    <option value="Chaco" <?php if ($provincia == 'Chaco') echo 'selected'; ?>>Chaco</option>
                                    <option value="Chubut" <?php if ($provincia == 'Chubut') echo 'selected'; ?>>Chubut</option>
                                    <option value="Córdoba" <?php if ($provincia == 'Córdoba') echo 'selected'; ?>>Córdoba</option>
                                    <option value="Corrientes" <?php if ($provincia == 'Corrientes') echo 'selected'; ?>>Corrientes</option>
                                    <option value="Entre Ríos" <?php if ($provincia == 'Entre Ríos') echo 'selected'; ?>>Entre Ríos</option>
                                    <option value="Formosa" <?php if ($provincia == 'Formosa') echo 'selected'; ?>>Formosa</option>
                                    <option value="Jujuy" <?php if ($provincia == 'Jujuy') echo 'selected'; ?>>Jujuy</option>
                                    <option value="La Pampa" <?php if ($provincia == 'La Pampa') echo 'selected'; ?>>La Pampa</option>
                                    <option value="La Rioja" <?php if ($provincia == 'La Rioja') echo 'selected'; ?>>La Rioja</option>
                                    <option value="Mendoza" <?php if ($provincia == 'Mendoza') echo 'selected'; ?>>Mendoza</option>
                                    <option value="Misiones" <?php if ($provincia == 'Misiones') echo 'selected'; ?>>Misiones</option>
                                    <option value="Neuquén" <?php if ($provincia == 'Neuquén') echo 'selected'; ?>>Neuquén</option>
                                    <option value="Río Negro" <?php if ($provincia == 'Río Negro') echo 'selected'; ?>>Río Negro</option>
                                    <option value="Salta" <?php if ($provincia == 'Salta') echo 'selected'; ?>>Salta</option>
                                    <option value="San Juan" <?php if ($provincia == 'San Juan') echo 'selected'; ?>>San Juan</option>
                                    <option value="San Luis" <?php if ($provincia == 'San Luis') echo 'selected'; ?>>San Luis</option>
                                    <option value="Santa Cruz" <?php if ($provincia == 'Santa Cruz') echo 'selected'; ?>>Santa Cruz</option>
                                    <option value="Santa Fe" <?php if ($provincia == 'Santa Fe') echo 'selected'; ?>>Santa Fe</option>
                                    <option value="Santiago del Estero" <?php if ($provincia == 'Santiago del Estero') echo 'selected'; ?>>Santiago del Estero</option>
                                    <option value="Tierra del Fuego" <?php if ($provincia == 'Tierra del Fuego') echo 'selected'; ?>>Tierra del Fuego</option>
                                    <option value="Tucumán" <?php if ($provincia == 'Tucumán') echo 'selected'; ?>>Tucumán</option>
                                </select>
                            </div>
                            <br>
                            <button class="btn container btn-primary fs-5" name="actualizar" onclick="return confirm('¿Estás de acuerdo en Actualizar tus datos')">Actualizar</button>
                            <br><br>
                            <button class="btn container btn-danger fs-5" name="cancelar" onclick="return confirm('¿Estás de acuerdo en Cancelar la edición de tu Perfil?')">Cancelar</button>
                        </form>
                    </div>
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