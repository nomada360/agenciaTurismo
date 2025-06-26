<?php
include 'db.php';

$Correo_Electronico = $_POST['Correo Electronico'];
$Contraseña = $_POST['Contraseña'];

$sql = "SELECT * FROM usuarios WHERE Correo Electronico = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $Correo_Electronico);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    if (password_verify($Contraseña, $usuario['Contraseña'])) {
        session_start();
        $_SESSION['usuario'] = $usuario['Correo Electronico'];
        header("Location: ../index.html");
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$stmt->close();
$conexion->close();
?>
