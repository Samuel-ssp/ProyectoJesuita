<?php
// Recoge la información del formulario
$nombre = $_POST["nombre"];
$codigo = $_POST["codigo"]; // Contraseña ingresada

// Conecta con la base de datos
include 'configdb.php';
include 'conexion.php';

// Encriptar la contraseña antes de almacenarla
$pwhash = password_hash($codigo, PASSWORD_DEFAULT);

// Cadena de consulta SQL para insertar usuario con la contraseña encriptada
$sql = "INSERT INTO jesuita (nombre, codigo) VALUES ('$nombre', '$pwhash')"; 

// Ejecuta la consulta
if ($conexion->query($sql)//Devuelve TRUE o FALSE) {
    echo "<h2>Jesuita registrado</h2>";
} else {
    echo "<h2>No se pudo registrar</h2>";
    echo '<h3><a href="jesuitaphp.html">Vuelve a intentarlo</a></h3>';
}

// Cierra la conexión
$conexion->close();
?>
