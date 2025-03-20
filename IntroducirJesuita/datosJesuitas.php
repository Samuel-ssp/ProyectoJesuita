<?php
//Recoge la información del formulario
	
	echo $nombre=$_GET["nombre"];// Variable para guardar los datos del formulario
	echo $codigo=$_GET["codigo"];

//Conecta con la base de datos ($conexión)     //incia sesion en la base de datos con el otro archivo de inicio de sesion
    include 'configdb.php'; //include del archivo con los datos de conexión
	$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD); //Conecta con la base de datos
    $conexion->set_charset("utf8"); //Usa juego caracteres UTF8
	//Desactiva errores
	$controlador = new mysqli_driver();
    $controlador->report_mode = MYSQLI_REPORT_OFF;
	
//Cadena de caracteres de la consulta sql	
	$sql="INSERT INTO jesuita (nombre,codigo)VALUES('".$nombre."','".$codigo."')";   //completa lo que falta
	echo $sql; //envía el contenido de la variable al navegador, o sea, muestra la información en el navegador
	
//Ejecuta la consulta
	$conexion->query($sql);
	if($conexion->affected_rows>0)
		echo "<h2>Jesuita registrado</h2>";
	else{
		echo "<h2>No se pudo registrar</h2>";
		echo '<h3><a href="jesuitaphp.html"> Vuelve a intentarlo</a></h3>';
	}	

//Cierra la conexión
	$conexion->close();
?>