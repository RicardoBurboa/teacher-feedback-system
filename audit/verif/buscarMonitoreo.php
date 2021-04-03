<?php

  if(isset($_POST['filtrar'])) {
    $valorABuscar = filter_var($_POST['valorABuscar'], FILTER_SANITIZE_STRING);
    $consultaTablaMonitoreo = "SELECT * FROM monitoreo WHERE CONCAT(mon_NumControl, mon_materia, mon_status) LIKE '%$valorABuscar%' ORDER BY mon_NumControl";
    $buscarResultado = filtrarTabla($consultaTablaMonitoreo);
  } else {
      $consultaTablaMonitoreo = "SELECT mon_NumControl, mon_materia, mon_status FROM monitoreo ORDER BY mon_NumControl";
      $buscarResultado = filtrarTabla($consultaTablaMonitoreo);
  }

  function filtrarTabla($query) {
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

    $filtrarResultado = mysqli_query($conexion, $query);
    return $filtrarResultado;
  }

?>
