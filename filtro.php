<?php
sleep(1);
include('conexion.php');

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin = date("Y-m-d", strtotime($_POST['f_fin']));

$consultaSQL = ("SELECT * FROM datos_usuarios WHERE fecha_ingreso BETWEEN '$fechaInit' AND '$fechaFin' ORDER BY fecha_ingreso ASC");
$query = mysqli_query($conexion, $consultaSQL);
// print_r($consultaSQL);
$total = mysqli_num_rows($query);
echo '<strong>Total: </strong> (' . $total . ')';
?>

<div class="container resultado-filtro">
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Email</th>
                        <th scope="col">Clave</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col" class="th-editar-registro">Editar</th>
                        <th scope="col" class="th-borrar-registro">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?php echo $row['id_usuario']; ?></td>
                            <td><?php echo $row['nombre_usuario']; ?></td>
                            <td><?php echo $row['apellido_usuario']; ?></td>
                            <td><?php echo $row['edad_usuario']; ?></td>
                            <td><?php echo $row['email_usuario']; ?></td>
                            <td><?php echo $row['clave_usuario']; ?></td>
                            <td><?php echo $row['provincia_usuario']; ?></td>
                            <td><?php echo $row['fecha_ingreso']; ?></td>
                            <td class="td-editar-registro">
                                <a href="editar_datos.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="btn btn-default">
                                    <i class="fas fa-solid fa-marker"></i>
                                </a>
                            </td>
                            <td class="td-borrar-registro">
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