<?php
	//Recoge la información del formulario
	session_start();
	$ip = $_GET["lugar"]; // Variable para guardar los datos del formulario
	$id = $_SESSION["idJesuita"];
	
	//Conecta con la base de datos ($conexión) // Inicia sesión en la base de datos con el otro archivo de inicio de sesión
	include 'configdb.php'; // include del archivo con los datos de conexión
	include 'conexion.php'; // include de conexión con la base de datos
	
	//Cadena de caracteres de la consulta SQL	
	$sql = "INSERT INTO visita (idJesuita, ip) VALUES(" . $_SESSION['idJesuita'] . ",'" . $ip . "')";  
	//echo $sql;
	
	//Ejecuta la consulta
	$jesuita = $conexion->query($sql);
	if ($conexion->affected_rows > 0)
		// Cierra la conexión
		$conexion->close();
?>
<!doctype HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="Author" content="Samuel Sánchez Ponce">
		<link rel="stylesheet" href="caminocss.css">
	</head>
	<body>
		<div>
			<h1>Visit Successfully Completed</h1> 
			<h3><a href="visitaIng.php">Make another visit</a></h3>
		</div>
	</body>
</html>
