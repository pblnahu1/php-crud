<?php

//$conexion = new mysqli("localhost", "root", "", "bdd_ntws"); 

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
    $conexion = new mysqli("localhost", "root", "", "bdd_ntws");
    if ($conexion->connect_error) {
        throw new Exception("Error de conexion a la Base de Datos " . $conexion->connect_error);
    }
    ?>
        <h6 style="text-align:center; color: blue;">Conectado a la Base de Datos</h6>
    <?php
} catch (Exception $e) {
?>
    <h6 style="text-align:center; color: red;"><?php echo $e->getMessage(); ?></h6>
<?php
}

?>