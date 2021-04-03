<?php

  session_start();

  if(empty($_SESSION['admin_user'])) {
    header ('location: index.php');
  }

  include('verif/buscarResultados.php');

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
        <h1>Resultados de las Encuestas</h1>
      </div>

      <div id="backMenu">
        <a id="backMenu" href="menu.php">Regresar al Menú Principal</a>
      </div>
    </div>

    <br>

    <div id="lateral">
      <button id="botonExportar" onclick="exportTableToExcel('tablaInfo', 'Resultados Encuesta')">Exportar Tabla a Excel</button>
    </div>

    <div id="formOpciones">
      <form action="resultados.php" method="POST">
      <strong>Buscar por:</strong> Materia<br>
      <br>
      <input id="camposOpciones" type="text" name="valorABuscar" placeholder="Valor">
      <input id="botonGeneral" type="submit" name="filtrar" value="Filtrar">
    </div>

    <div class="tabla">
      <table id="tablaInfo">
        <tr>
          <th>Materia</th>
          <th>Resp. 1</th>
          <th>Resp. 2</th>
          <th>Resp. 3</th>
          <th>Resp. 4</th>
          <th>Resp. 5</th>
          <th>Resp. 6</th>
          <th>Resp. 7</th>
          <th>Resp. 8</th>
          <th>Resp. 9</th>
          <th>Resp. 10</th>
          <th>Fecha</th>
        </tr>
        <?php
          if($buscarResultado-> num_rows > 0) {
            while($row = mysqli_fetch_array($buscarResultado)):
        ?>
              <tr>
                <td><?php echo htmlspecialchars($row['materia']);?></td>
                <td><?php echo htmlspecialchars($row['res1']);?></td>
                <td><?php echo htmlspecialchars($row['res2']);?></td>
                <td><?php echo htmlspecialchars($row['res3']);?></td>
                <td><?php echo htmlspecialchars($row['res4']);?></td>
                <td><?php echo htmlspecialchars($row['res5']);?></td>
                <td><?php echo htmlspecialchars($row['res6']);?></td>
                <td><?php echo htmlspecialchars($row['res7']);?></td>
                <td><?php echo htmlspecialchars($row['res8']);?></td>
                <td><?php echo htmlspecialchars($row['res9']);?></td>
                <td><?php echo htmlspecialchars($row['res10']);?></td>
                <td><?php echo htmlspecialchars($row['encuesta_fecha']);?></td>
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
