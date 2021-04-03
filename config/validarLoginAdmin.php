<?php

  //Código para validar el inicio de sesión de los administradores.

  session_start();

  if (isset($_POST['campoNombreAdmin']) and isset($_POST['campoPassAdmin'])) {

    include('conexion.php');

    $getUsuario =  mysqli_real_escape_string($conexion, $_POST['campoNombreAdmin']);
    $getPassword = mysqli_real_escape_string($conexion, $_POST['campoPassAdmin']);

    $consultaLogin = 'SELECT * FROM administradores WHERE admin_user = "' . $getUsuario . '" AND admin_pass = "' . $getPassword . '"';
    $comprobacion = $conexion->query($consultaLogin);

    if ($comprobacion->num_rows > 0) {

      $_SESSION['admin_user'] = $getUsuario;
      header('location: ../audit/menu.php');

    } else {

      print 'El usuario y contraseña son incorrectos.<br>
      <a href="../audit/login.php">Volver</a>';

    }

  } else {

    //Por si alguien quiere ingresar a este archivo desde el navegador, los redireccionará a este lugar vacío.
    header ('location: ../index.php');

  }

?>
