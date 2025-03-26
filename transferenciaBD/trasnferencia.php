<?php

//Conecta con la base de datos ($conexión)     
    include 'configdb.php'; 
	include 'conexion.php';
	
	//CONSULTAS 
	$sql= "SELECT * FROM oldjesuita;";
	$resultado=$conexion->query($sql);
	// Bucle para pasar fila a fila
	while ($fila=$resultado->fetch_array()) {
					$pwhash=password_hash($fila[codigo],PASSWORD_DEFAULT);
					$sql2="INSERT INTO jesuita(codigo,nombre,nombreAlumno,firma,firmaIngles) VALUES ($pwhash,$fila["nombre"],$fila["nombreAlumno"],$fila["firma"],$fila["firmaIngles"]);";
					echo $conexion->query($sql2);
				}
	$conexion->close();//Cierra la conexión
?>	