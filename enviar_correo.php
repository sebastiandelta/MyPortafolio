<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portafolio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$tema = $_POST['tema'];
$mensaje = $_POST['mensaje'];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO contactos (nombre, telefono, correo, tema, mensaje)
        VALUES ('$nombre', '$telefono', '$correo', '$tema', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Mensaje enviado correctamente']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
}

// Cerrar conexión
$conn->close();