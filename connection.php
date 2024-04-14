<?php
$host = "localhost";
$port = "5432";
$dbname = "test";
$user = "postgres";
$password = "root";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";

$dbconn = pg_connect($connection_string);

if (!$dbconn) {
    echo "Error: No se pudo conectar a PostgreSQL.";
} else {
    echo "Conexión exitosa a PostgreSQL!";
}
