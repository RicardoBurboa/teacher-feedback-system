<?php

  session_start();
  include('config/conexion.php');

  $numControl = $_SESSION['usu_usuario'];

  $consultaMaterias = $conexion->query("SELECT mon_materia FROM monitoreo WHERE mon_NumControl = '".$numControl."' AND mon_status = 'no'");

  if($consultaMaterias->num_rows < 1) {
    header ('location: end.php');
    session_destroy();
  }

  while($rows = $consultaMaterias->fetch_assoc()) {
    $nombreMaterias = $rows['mon_materia'];
    echo "<option value='$nombreMaterias'>$nombreMaterias</option>";
  }

?>
