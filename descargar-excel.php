<?php

require_once("conexion.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=lista_usuarios_registrados.xls");

?>

<table class="table table-striped table-dark" id="table_id">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Email</th>
            <th>Clave</th>
            <th>Provincia</th>
            <th>Fecha Ingreso</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM datos_usuarios";
        $dato = mysqli_query($conexion, $sql);

        if($dato->num_rows > 0){
            while($fila = mysqli_fetch_array($dato)){
                ?>
                <tr>
                    <td><?php echo $fila['id_usuario']; ?></td>
                    <td><?php echo $fila['nombre_usuario']; ?></td>
                    <td><?php echo $fila['apellido_usuario']; ?></td>
                    <td><?php echo $fila['edad_usuario']; ?></td>
                    <td><?php echo $fila['email_usuario']; ?></td>
                    <td><?php echo $fila['clave_usuario']; ?></td>
                    <td><?php echo $fila['provincia_usuario']; ?></td>
                    <td><?php echo $fila['fecha_ingreso']; ?></td>
                </tr>
                <?php 
            }
        }
        ?>
    </tbody>
</table>