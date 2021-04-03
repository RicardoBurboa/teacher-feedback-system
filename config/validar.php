<?php

  //Código para validar el inicio de sesión de los alumnos.

  session_start();

  if (isset($_POST['campoUsuario']) and isset($_POST['campoPassword'])) {

    include('conexion.php');

    $getUsuario =  mysqli_real_escape_string($conexion, $_POST['campoUsuario']);
    $getPassword = mysqli_real_escape_string($conexion, $_POST['campoPassword']);

    $consultaLogin = 'SELECT * FROM usuarios WHERE usu_usuario = "' . $getUsuario . '" AND usu_pass = "' . $getPassword . '"';
    $comprobacion = $conexion->query($consultaLogin);
    
    if ($comprobacion->num_rows > 0) {

      $_SESSION['usu_usuario'] = $getUsuario;
      header('location: ../encuesta.php');

    } else {

      print 'El usuario y contraseña son incorrectos.<br>
      <a href="../login.php">Volver</a>';

    }

  } else {

    //Por si alguien quiere ingresar a este archivo desde el navegador, los redireccionará a este lugar vacío.
    header ('location: ../index.php');

  }

?>
