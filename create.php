<?php
require_once 'empleado.php';
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $salario = $_POST["salario"];

    $empleado = new Empleado(null, $nombre, $direccion, $salario);
    create($dbconn, $empleado);

    header("Location: index.php");
}
