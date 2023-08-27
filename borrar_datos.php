<?php 

    include("conexion.php");

    if(isset($_GET['id_usuario'])){
    $id = $_GET['id_usuario'];

    $consultaBorrar = "DELETE FROM datos_usuarios WHERE id_usuario = '$id'";

    $resultado = mysqli_query($conexion, $consultaBorrar);

    if(!$resultado){
        die("Fallo la consulta de eliminacion");
    }

    // Consulta para ajusta el valor AUTO_INCREMENT del campo ID de en la tabla
    $queryAutoIncrement = "ALTER TABLE datos_usuarios AUTO_INCREMENT = $id";
	$resultadoAutoIncrement = mysqli_query($conexion, $queryAutoIncrement);
	if(!$resultadoAutoIncrement){
		die("Fallo la consulta de ajuste de AUTO_INCREMENT");
	}

	header("Location: pagina-inicio.php");
	exit();
}

?>