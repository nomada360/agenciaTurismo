<?php
include 'db.php';

$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Email = $_POST['Correo Electronico'];
$Teléfono = $_POST['Telefono'];
$Contraseña = Contraseña_hash($_POST['Contraseña'], PASSWORD_DEFAULT); 

$sql = "INSERT INTO usuarios (Nombre, Apellido, Correo Electronico, Teléfono, Comtraseña) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssss", $nombre, $apellido, $email, $telefono, $password);

if ($stmt->execute()) {
    header("Location: ../login.html?registro=ok");
} else {
    echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
