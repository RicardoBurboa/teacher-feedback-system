<?php

  session_start();

  if(empty($_SESSION['admin_user'])) {
    header ('location: index.php');
  }

  include('verif/buscarMonitoreo.php');

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>SRDD - Web</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/audit.css">
    <script src="../js/exportarExcel.js"></script>

  </head>

  <?php include('../templates/header.html'); ?>

  <body>

    <div id="textoArriba">
      <div id="encabezado">
        <h1>Monitoreo de Encuestas</h1>
      </div>

      <div id="backMenu">
        <a id="backMenu" href="menu.php">Regresar al Menú Principal</a>
      </div>
    </div>

    <br>

    <div id="lateral">
      <form action="verif/reiniciarStatus.php" method="POST">
        <p>Reinice el status cada semana.</p>
        <input id="botonGeneral" type="submit" name="reiniciarStatus" value="Reiniciar Status a No">
      </form>
        <button id="botonExportar" onclick="exportTableToExcel('tablaInfo', 'Monitoreo Encuestas')">Exportar Tabla a Excel</button>
    </div>

    <div id="formOpciones">
      <form action="monitoreo.php" method="POST">
      <strong>Buscar por:</strong> Número de Control o Materia<br>
      <br>
      <input id="camposOpciones" type="text" name="valorABuscar" placeholder="Valor">
      <input id="botonGeneral" type="submit" name="filtrar" value="Filtrar">
    </div>

    <br>
    <br>
    <br>

    <div class="tabla">
      <table id="tablaInfo">
        <tr>
          <th>Número de Control</th>
          <th>Materia</th>
          <th>Status</th>
        </tr>
        <?php
          if($buscarResultado-> num_rows > 0) {
            while($row = mysqli_fetch_array($buscarResultado)):
        ?>
              <tr>
                <td><?php echo htmlspecialchars($row['mon_NumControl']);?></td>
                <td><?php echo htmlspecialchars($row['mon_materia']);?></td>
                <td><?php echo htmlspecialchars($row['mon_status']);?></td>
              </tr>
        <?php
            endwhile;
          } else {
              echo "<h2>0 resultados.<h2>";
            }
        ?>
      </table>
      </form>
    </div>

    <br>
    <a id= "irArriba" href="#top">Ir arriba</a>

  </body>

</html>
