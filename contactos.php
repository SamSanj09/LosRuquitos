<?php
// Datos de conexión a la base de datos MySQL
$servername = "localhost"; // Si MySQL está en el mismo servidor que el script PHP
$username = "root"; // Nombre de usuario de MySQL
$password = ""; // Contraseña de MySQL (generalmente vacía por defecto en XAMPP)
$database = "ruquitos"; // Nombre de la base de datos
$table = "contactos"; // Nombre de la tabla

// Establecer conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} 

// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$dmensaje = $_POST['dmensaje'];

// Insertar datos en la base de datos
$sql = "INSERT INTO contactos(nombre, celular, correo, dmensaje) VALUES ('$nombre', '$celular', '$correo', '$dmensaje')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Los datos se han insertado correctamente.");</script>';
} else {
     echo '<script>alert("Error al insertar los datos.");</script>';
}

// Cerrar conexión a la base de datos
$conn->close();
?>
