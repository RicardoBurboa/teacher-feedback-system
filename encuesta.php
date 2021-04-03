<?php

  session_start();
  include('config/conexion.php');

  //Si no hay una sesión iniciada, redirecciona a index.php
  if (empty($_SESSION['usu_usuario'])) {
    header ('location: index.php');
  }

  //Checa si se da click en el botón de "Guardar Encuesta".
  if(isset($_POST['botonGuardarEncuesta'])) {

    if(empty($_POST['pregunta1']) or empty($_POST['pregunta2']) or empty($_POST['pregunta3']) or empty($_POST['pregunta4']) or empty($_POST['pregunta5']) or empty($_POST['pregunta6']) or empty($_POST['pregunta7']) or empty($_POST['pregunta8']) or empty($_POST['pregunta9']) or empty($_POST['pregunta10'])) {
      echo '<script type="text/javascript"> alert("Favor de responder todas las preguntas."); </script>';
    } else {

        $numControl = $_SESSION['usu_usuario'];

        $getMateria = mysqli_real_escape_string($conexion, $_POST["ddMaterias"]);
        $res1 = mysqli_real_escape_string($conexion, $_POST['pregunta1']);
        $res2 = mysqli_real_escape_string($conexion, $_POST['pregunta2']);
        $res3 = mysqli_real_escape_string($conexion, $_POST['pregunta3']);
        $res4 = mysqli_real_escape_string($conexion, $_POST['pregunta4']);
        $res5 = mysqli_real_escape_string($conexion, $_POST['pregunta5']);
        $res6 = mysqli_real_escape_string($conexion, $_POST['pregunta6']);
        $res7 = mysqli_real_escape_string($conexion, $_POST['pregunta7']);
        $res8 = mysqli_real_escape_string($conexion, $_POST['pregunta8']);
        $res9 = mysqli_real_escape_string($conexion, $_POST['pregunta9']);
        $res10 = mysqli_real_escape_string($conexion, $_POST['pregunta10']);

        $insertEncuesta = "INSERT INTO encuestas(materia, res1, res2, res3, res4, res5, res6, res7, res8, res9, res10) VALUES('$getMateria', '$res1', '$res2', '$res3', '$res4', '$res5', '$res6', '$res7', '$res8', '$res9', '$res10')";
        $consultaRun = $conexion->query($insertEncuesta);

        if($consultaRun) {
          echo '<script type="text/javascript"> alert("Se ha guardado la encuesta de esta materia."); </script>';
          $updateMonitoreo = "UPDATE monitoreo SET mon_status = 'si' WHERE mon_NumControl = '".$numControl."' AND mon_materia = '".$getMateria."'";
          $consultaUpdate = $conexion->query($updateMonitoreo);
        } else {
          echo '<script type="text/javascript"> alert("Error. No se pudo guardar la encuesta."); </script>';
        }

    }

  } else {

  }

?>

<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8">
    <title>SRDD - Web</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/encuesta.css">

  </head>

  <div id="top"></div>

  <?php include('templates/header.html'); ?>

  <body>

    <div id="containerMain">

      <div id="mensajeEncabezado">
        <h2>Lea detenidamente y conteste las preguntas acerca de sus docentes.</h2>
      </div>

      <div id="lateral">

        <div id="encuestaNumControl">
          <h3>Encuesta del alumno con el número de control:</h3>
          <form action="encuesta.php" method="POST">
            <label><?php echo $_SESSION['usu_usuario']; ?></label>
          </form>
          <br>
        </div>

        <br>

        <div id="descripcionRespuestas">
          <h3>Descripción de los incisos:</h3>
          <ul>
            <li>1 = Deficiente</li>
            <li>2 = Regular</li>
            <li>3 = Bien</li>
            <li>4 = Muy Bien</li>
            <li>5 = Excelente</li>
          </ul>
        </div>

      </div>

      <div id="formPreguntas" class="wrap">
        <form class="formulario" action="" method="POST">

          <div id="seleccionarMateria">
            <label>Seleccione una de sus materias:</label>
            <select name="ddMaterias">
              <?php
                include('config/rellenarMaterias.php');
              ?>
            </select>
          </div>

          <br>

          <div class="radio">
            <h2>Preguntas</h2>

            <div id="pregunta">
              <h3>1- Explica de manera clara los contenidos de la asignatura.</h3>

              <input type="radio" name="pregunta1" value="1" id="p1r1">
              <label for="p1r1">1.</label>

              <input type="radio" name="pregunta1" value="2" id="p1r2">
              <label for="p1r2">2.</label>

              <input type="radio" name="pregunta1" value="3" id="p1r3">
              <label for="p1r3">3.</label>

              <input type="radio" name="pregunta1" value="4" id="p1r4">
              <label for="p1r4">4.</label>

              <input type="radio" name="pregunta1" value="5" id="p1r5">
              <label for="p1r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>2- Durante el curso establece las estrategias adecuadas y necesarias para lograr el aprendizaje deseado.</h3>

              <input type="radio" name="pregunta2" value="1" id="p2r1">
              <label for="p2r1">1.</label>

              <input type="radio" name="pregunta2" value="2" id="p2r2">
              <label for="p2r2">2.</label>

              <input type="radio" name="pregunta2" value="3" id="p2r3">
              <label for="p2r3">3.</label>

              <input type="radio" name="pregunta2" value="4" id="p2r4">
              <label for="p2r4">4.</label>

              <input type="radio" name="pregunta2" value="5" id="p2r5">
              <label for="p2r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>3- Incluye experiencias de aprendizaje en lugares diferentes al aula.</h3>

              <input type="radio" name="pregunta3" value="1" id="p3r1">
              <label for="p3r1">1.</label>

              <input type="radio" name="pregunta3" value="2" id="p3r2">
              <label for="p3r2">2.</label>

              <input type="radio" name="pregunta3" value="3" id="p3r3">
              <label for="p3r3">3.</label>

              <input type="radio" name="pregunta3" value="4" id="p3r4">
              <label for="p3r4">4.</label>

              <input type="radio" name="pregunta3" value="5" id="p3r5">
              <label for="p3r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>4- Adapta las actividades para atender los diferentes estilos de aprendizaje de los estudiantes.</h3>

              <input type="radio" name="pregunta4" value="1" id="p4r1">
              <label for="p4r1">1.</label>

              <input type="radio" name="pregunta4" value="2" id="p4r2">
              <label for="p4r2">2.</label>

              <input type="radio" name="pregunta4" value="3" id="p4r3">
              <label for="p4r3">3.</label>

              <input type="radio" name="pregunta4" value="4" id="p4r4">
              <label for="p4r4">4.</label>

              <input type="radio" name="pregunta4" value="5" id="p4r5">
              <label for="p4r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>5- Muestra compromiso y entusiasmo en sus actividades docentes.</h3>

              <input type="radio" name="pregunta5" value="1" id="p5r1">
              <label for="p5r1">1.</label>

              <input type="radio" name="pregunta5" value="2" id="p5r2">
              <label for="p5r2">2.</label>

              <input type="radio" name="pregunta5" value="3" id="p5r3">
              <label for="p5r3">3.</label>

              <input type="radio" name="pregunta5" value="4" id="p5r4">
              <label for="p5r4">4.</label>

              <input type="radio" name="pregunta5" value="5" id="p5r5">
              <label for="p5r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>6- Proporciona información para realizar adecuadamente las actividades de evaluación.</h3>

              <input type="radio" name="pregunta6" value="1" id="p6r1">
              <label for="p6r1">1.</label>

              <input type="radio" name="pregunta6" value="2" id="p6r2">
              <label for="p6r2">2.</label>

              <input type="radio" name="pregunta6" value="3" id="p6r3">
              <label for="p6r3">3.</label>

              <input type="radio" name="pregunta6" value="4" id="p6r4">
              <label for="p6r4">4.</label>

              <input type="radio" name="pregunta6" value="5" id="p6r5">
              <label for="p6r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>7- Escucha y toma en cuenta las opiniones de los estudiantes.</h3>

              <input type="radio" name="pregunta7" value="1" id="p7r1">
              <label for="p7r1">1.</label>

              <input type="radio" name="pregunta7" value="2" id="p7r2">
              <label for="p7r2">2.</label>

              <input type="radio" name="pregunta7" value="3" id="p7r3">
              <label for="p7r3">3.</label>

              <input type="radio" name="pregunta7" value="4" id="p7r4">
              <label for="p7r4">4.</label>

              <input type="radio" name="pregunta7" value="5" id="p7r5">
              <label for="p7r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>8- Asiste a clases regular y puntualmente.</h3>

              <input type="radio" name="pregunta8" value="1" id="p8r1">
              <label for="p8r1">1.</label>

              <input type="radio" name="pregunta8" value="2" id="p8r2">
              <label for="p8r2">2.</label>

              <input type="radio" name="pregunta8" value="3" id="p8r3">
              <label for="p8r3">3.</label>

              <input type="radio" name="pregunta8" value="4" id="p8r4">
              <label for="p8r4">4.</label>

              <input type="radio" name="pregunta8" value="5" id="p8r5">
              <label for="p8r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>9- Promueve el uso de diversas herramientas, particularmente las digitales, para gestionar información.</h3>

              <input type="radio" name="pregunta9" value="1" id="p9r1">
              <label for="p9r1">1.</label>

              <input type="radio" name="pregunta9" value="2" id="p9r2">
              <label for="p9r2">2.</label>

              <input type="radio" name="pregunta9" value="3" id="p9r3">
              <label for="p9r3">3.</label>

              <input type="radio" name="pregunta9" value="4" id="p9r4">
              <label for="p9r4">4.</label>

              <input type="radio" name="pregunta9" value="5" id="p9r5">
              <label for="p9r5">5.</label>

              <br>
            </div>

            <div id="pregunta">
              <br>
              <h3>10- Estoy satisfecho/a por mi nivel de desempeño y aprendizaje logrado gracias a la labor del docente.</h3>

              <input type="radio" name="pregunta10" value="1" id="p10r1">
              <label for="p10r1">1.</label>

              <input type="radio" name="pregunta10" value="2" id="p10r2">
              <label for="p10r2">2.</label>

              <input type="radio" name="pregunta10" value="3" id="p10r3">
              <label for="p10r3">3.</label>

              <input type="radio" name="pregunta10" value="4" id="p10r4">
              <label for="p10r4">4.</label>

              <input type="radio" name="pregunta10" value="5" id="p10r5">
              <label for="p10r5">5.</label>

              <br>
            </div>

            <div id="botonGuardar">
              <br>
              <br>
              <br>
              <input class ="botonGuardar" type= "submit" name="botonGuardarEncuesta" value="Guardar Encuesta"/> <br>
            </div>

          </div>
        </form>
      </div>

      <br>
      <br>

      <a id= "irArriba" href="#top">Ir arriba</a>

    </div>

  </body>
</html>
