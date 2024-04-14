<?php
require_once 'connection.php';

class Empleado
{
    public $id;
    public $nombre;
    public $direccion;
    public $salario;

    function __construct($id, $nombre, $direccion, $salario)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->salario = $salario;
    }
}

// Crear
function create($dbconn, $empleado)
{
    $query = "INSERT INTO public.empleados (nombre, direccion, salario) VALUES ('$empleado->nombre', '$empleado->direccion', $empleado->salario)";
    return pg_query($dbconn, $query);
}

// Leer
function read($dbconn)
{
    $query = "SELECT * FROM public.empleados ORDER BY id";
    $result = pg_query($dbconn, $query);
    return pg_fetch_all($result);
}

function readid($dbconn, $id)
{
    $query = "SELECT * FROM public.empleados WHERE id = $id";
    $result = pg_query($dbconn, $query);
    $row = pg_fetch_assoc($result);

    return new Empleado($row['id'], $row['nombre'], $row['direccion'], $row['salario']);
}

// Actualizar
function update($dbconn, $empleado)
{
    $query = "UPDATE public.empleados SET nombre = '$empleado->nombre', direccion = '$empleado->direccion', salario = $empleado->salario WHERE id = $empleado->id";
    return pg_query($dbconn, $query);
}

// Eliminar
function delete($dbconn, $empleado)
{
    $query = "DELETE FROM public.empleados WHERE id = $empleado->id";
    return pg_query($dbconn, $query);
}
