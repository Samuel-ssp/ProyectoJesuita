<?php
	//Inicio de sesion
		session_start();
	//Conecta con la base de datos ($conexión)     //incia sesion en la base de datos con el otro archivo de inicio de sesion
		include 'configdb.php'; //include del archivo con los datos de conexión
		include 'conexion.php'; //include de conexión con la base de datos
	?>
<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="Author" content="Samuel Sánchez Ponce">
        <link rel="stylesheet" href="caminocss.css">
    </head>
    <body>
		<a href="visitaIng.php">
			<img src="bandera_inglaterra.png" alt="English Version" class="idioma">
		</a>
		<form method="GET" action="guardar_visita.php">
			<h1>Hola, <?php echo$_SESSION["nombre"];?></h1>		
			<label for="lugar">Donde desea viajar:</label>
			<select name="lugar">
			<?php
				$sqlLugar="SELECT * FROM lugar";
				$resultado=$conexion->query($sqlLugar);
				// Bucle para crear las opciones del 'select'
				while ($fila=$resultado->fetch_array()) {
					echo "<option value=".$fila["ip"].">".$fila["lugar"]."</option>";
				}
				$conexion->close();//Cierra la conexión
			?>
			</select>
			<br><br><br>
			<input type="submit" value="Viajar">
		</form>  		
    </body>
</html>
