<?php
	// Inicia sesión
	session_start();

	// Guarda las variables de nombre y código en la sesión
	$_SESSION["nombre"] = $_POST["nombre"];
	$_SESSION["codigo"] = $_POST["codigo"];

	// Archivos de configuración y conexión a la base de datos
	include 'configdb.php'; // Archivo con la configuración de la base de datos
	include 'conexion.php'; // Archivo con la conexión a la base de datos

	// Consulta SQL para buscar jesuita
	$sql = "SELECT idJesuita, codigo FROM jesuita WHERE nombre = '".$_SESSION['nombre']."'";

	// Ejecuta la consulta
	$resultado = $conexion->query($sql);

	// Verifica si se encontró un jesuita con ese nombre
	if ($resultado->num_rows > 0) {
		// Si el jesuita existe, obtenemos el codigo de la base de datos
		$fila = $resultado->fetch_assoc();
		$bdhash = $fila["codigo"]; // Hash de la contraseña almacenado en la base de datos

		// Verifica si la contraseña ingresada coincide con el hash almacenado
		if (password_verify($_SESSION['codigo'], $bdhash)) {//Comprobacion entre codigo introducido y hash de la base de datos
			// Si la contraseña es correcta, guarda el idJesuita en $_SESSION["idJesuita"]
			$_SESSION["idJesuita"] = $fila["idJesuita"];
			
			// Muestra mensaje de éxito y enlace para continuar con la visita
		 echo "<h2>Session started successfully</h2>";
        echo '<h3><a href="visitIng.php">Continue with the visit</a></h3>';
    } else {
        echo "<h2>Incorrect name or code</h2>";
        echo '<h3><a href="jesuitaIng.html">Try again</a></h3>';
	/*Opcion para señalar si el jesuita no existe, Personalmente no me gusta decir que parte esta mal al introducir por
		problemas en la seguridad
	} else {
		// Si no se encontró ningún jesuita con el nombre proporcionado
		echo "<h2> Jesuita no encontrado</h2>";
		echo '<h3><a href="jesuita.html">Vuelve a intentarlo</a></h3>';
	} */

	// Cierra la conexión con la base de datos
	$conexion->close();
?>

