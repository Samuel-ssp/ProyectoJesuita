<?php
    //Inicio de sesión
    session_start();
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["codigo"] = $_POST["codigo"];

    //Conecta con la base de datos ($conexión)     //incia sesion en la base de datos con el otro archivo de inicio de sesion
		include 'configdb.php'; //include del archivo con los datos de conexión
		include 'conexion.php'; //include de conexión con la base de datos

    //Cadena de caracteres de la consulta sql
    $sql = "SELECT * FROM jesuita WHERE nombre='" . $_SESSION['nombre'] . "' AND codigo='" . $_SESSION['codigo'] . "';";
    echo $sql;

    // Execute the query
    $jesuita = $conexion->query($sql);

    if ($conexion->affected_rows > 0) {
        //Una vez cofirmado el inicio de sesion guardo el idJesuita para futuros usos
        $fila = $jesuita->fetch_array(); //Guardo el numero de filas
        $_SESSION["idJesuita"] = $fila["idJesuita"]; //Traspaso el id a la funcion de sesión

        echo "<h2>Session started successfully</h2>";
        echo '<h3><a href="visitIng.php">Continue with the visit</a></h3>';
    } else {
        echo "<h2>Incorrect name or code</h2>";
        echo '<h3><a href="jesuitaIng.html">Try again</a></h3>';
    }

    // Close the connection
    $conexion->close();
?>
