<?php

  session_start();

  if(empty($_SESSION['admin_user'])) {
    header ('location: index.php');
  }

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>SRDD - Web</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/audit.css">

  </head>

  <?php include('../templates/header.html'); ?>

  <body>
    <div id="textoArriba">
      <h1>Menú Auditorias</h1>
    </div>

    <a href="monitoreo.php">Monitoreo de Encuestas</a>
    <br>
    <a href="resultados.php">Resultados de las Encuestas</a>
    <br>
    <a href="docentes.php">Docentes</a>
    <br>
    <a href="verif/logout.php">Cerrar Sesión</a>
  </body>

</html>
