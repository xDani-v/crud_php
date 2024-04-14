<?php
require_once 'empleado.php';
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $salario = $_POST["salario"];

    $empleado = new Empleado($id, $nombre, $direccion, $salario);
    update($dbconn, $empleado);

    header("Location: index.php");
}
