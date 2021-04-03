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
      <div id="encabezado">
        <h1>Docentes</h1>
      </div>

      <div id="backMenu">
        <a id="backMenu" href="menu.php">Regresar al Menú Principal</a>
      </div>
    </div>

    <br>
    <h1>SITIO BAJO MANTENIMIENTO</h1>

    <br>
    <a id= "irArriba" href="#top">Ir arriba</a>

  </body>

</html>
