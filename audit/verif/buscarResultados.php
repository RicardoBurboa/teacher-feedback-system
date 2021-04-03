<?php

  if(isset($_POST['filtrar'])) {
    $valorABuscar = filter_var($_POST['valorABuscar'], FILTER_SANITIZE_STRING);
    $consultaTablaMonitoreo = "SELECT materia, res1, res2, res3, res4, res5, res6, res7, res8, res9, res10, encuesta_fecha FROM encuestas WHERE materia LIKE '%$valorABuscar%' ORDER BY encuesta_fecha";
    $buscarResultado = filtrarTabla($consultaTablaMonitoreo);
  } else {
      $consultaTablaMonitoreo = "SELECT materia, res1, res2, res3, res4, res5, res6, res7, res8, res9, res10, encuesta_fecha FROM encuestas ORDER BY encuesta_fecha";
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
