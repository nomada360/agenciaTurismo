<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = ''; // Dejar vacío si no tiene contraseña
$baseDeDatos = 'nomade360';

$conexion = new mysqli($host, $usuario, $contraseÑa, $baseDeDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
