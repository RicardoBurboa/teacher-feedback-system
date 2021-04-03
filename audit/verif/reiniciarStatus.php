<?php

  if(isset($_POST['reiniciarStatus'])) {
    include('../../config/conexion.php');

    $consultaReiniciarStatus = "UPDATE monitoreo SET mon_status='no'";
    $result = $conexion->query($consultaReiniciarStatus);
    $conexion->close();

    //Para que te mande a la misma página para que no te mande a una página en blanco.
    header('location: ../monitoreo.php');

  } else {
    //Hacer nada.
  }

?>
