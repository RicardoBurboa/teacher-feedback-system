<?php

	//Datos para conectarse a la base de datos.
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$baseDatos = 'srddweb';

	//Conecta a la base de datos.
  $conexion = mysqli_connect($host, $user, $pass, $baseDatos);

  //Revisa la conexión.
	if (!$conexion) {
		echo 'Error de Conexión: ' . mysqli_connect_error();
	}

?>
