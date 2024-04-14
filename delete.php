<?php
require_once 'empleado.php';
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $empleado = new Empleado($id, null, null, null);
    delete($dbconn, $empleado);

    header("Location: index.php");
}
