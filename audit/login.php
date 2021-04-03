<?php

  session_start();

  if (!empty($_SESSION['admin_user'])) {
    header ('location: menu.php');
  }

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>SRDD - Web</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
  </head>

  <?php include('../templates/header.html'); ?>

  <body>

    <div class="espacioEncabezado">
      <h1>Introduzca sus Datos</h1>
    </div>

    <div id="formLogin">
        <form action="../config/validarLoginAdmin.php" method="post" enctype="application/x-www-form-urlencoded">
            <div id="divLogin" align="center">
              <p><input id="camposLogin" type="text" name="campoNombreAdmin" placeholder="Nombre de Usuario" required></p>
              <p><input id="camposLogin" type="password" name="campoPassAdmin" placeholder="Contraseña" required></p>
            </div>
            <br>
            <br>
            <input class="btnLoginCSS" type="submit" name="botonLogin" value="Iniciar Sesión">
        </form>
    </div>

  </body>

</html>
