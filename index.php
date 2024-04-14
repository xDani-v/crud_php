<?php
require_once 'connection.php';
require_once 'empleado.php';

$empleados = read($dbconn);

// Si se pasa un ID de empleado a través de GET, obtenemos los datos de ese empleado
if (isset($_GET['id'])) {
    $empleado = readid($dbconn, $_GET['id']);
    $action = "update.php";
} else {
    $empleado = new Empleado(null, "", "", "");
    $action = "create.php";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Empleados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <h1>Lista de Empleados</h1>

    <!-- Formulario para agregar o modificar un empleado -->
    <form action="<?php echo $action; ?>" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $empleado->id; ?>">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $empleado->nombre; ?>"><br>
        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" value="<?php echo $empleado->direccion; ?>"><br>
        <label for="salario">Salario:</label><br>
        <input type="number" id="salario" name="salario" step="0.01" value="<?php echo $empleado->salario; ?>"><br>
        <input type="submit" value="Guardar">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Salario</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($empleados as $empleado) { ?>
            <tr>
                <td><?php echo $empleado['id']; ?></td>
                <td><?php echo $empleado['nombre']; ?></td>
                <td><?php echo $empleado['direccion']; ?></td>
                <td><?php echo $empleado['salario']; ?></td>
                <td>
                    <!-- Botones para modificar y eliminar -->
                    <button type="submit">
                        <a href="index.php?id=<?php echo $empleado['id']; ?>">Modificar</a>
                    </button>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>



<style>
    body {
        padding: 30px;
        width: 800px;
        margin: auto;
        align-items: center;
    }
</style>