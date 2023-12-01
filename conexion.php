<?php

//$conexion = new mysqli("localhost", "root", "", "database_project_crud"); 

/*if($conexion){
    ?>
        <h6 style="text-align:center; color: blue;">Conectado a la Base de Datos</h6>
    <?php
}else{
    ?>
        <h6 style="text-align:center; color: red;">Hubo un error con el servidor</h6>
    <?php
}*/

?>

<?php

try {
    $conexion = new mysqli("localhost", "root", "", "database_project_crud");
    if ($conexion->connect_error) {
        throw new Exception("Error de conexion a la Base de Datos " . $conexion->connect_error);
    }
?>
    <!-- <h5 style="text-align:center; color: blue;">¡Conectado a la Base de Datos!</h5> -->
<?php
} catch (Exception $e) {
?>
    <h5 style="text-align:center; color: red;">ERROR DE CONEXIÓN A LA BASE DE DATOS:<?php echo " " . $e->getMessage(); ?></h5>
<?php
}

?>