<?php

  session_start();

  if (!empty($_SESSION['usu_usuario'])) {
    header ('location: encuesta.php');
  }

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>SRDD - Web</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>

  <?php include('templates/header.html'); ?>

  <body>
    <div id="texto-index">
      <h4>Gracias por realizar la evaluación docente.</h4>
    </div>

  </body>

</html>
