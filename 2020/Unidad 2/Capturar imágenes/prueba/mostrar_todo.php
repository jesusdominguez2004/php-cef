<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<!-- -->
<?php
      include 'conexión_prueba.php';
      include 'clase_buscarUsuario.php';  
?>

<div class="container">
  <div class="panel-body">
      <div class="table-default">
          <!-- Tabla Mostrar Usuarios -->
          <table class="table table-striped" cellspacing="0" width="80%">
            <!-- Encabezado tabla-->
              <thead>
              <tr> <!-- <tr> = fila --> <!-- <th> = columna -->
                   <!-- Todos los Width deben sumar 100% --> 
                    <th width="5%">No</th>
                    <th width="10%">CÓDIGO</th>
                    <th width="30%">NOMBRE</th>
                    <th width="30%">APELLIDOS</th>
                    <th width="25%">CORREO</th>
              </tr>  
              </thead>
              <!-- Cuerpo tabla-->
              <tbody>
                  <?php
                    //Decodificar los registros en json_ver_usuarios
                    $dato = new clase_buscarUsuario();
                    $consulta = $dato -> ver_usuarios();
                    $json_ver_usuarios = json_decode($consulta);
                    //Para decir cuántos registros hay
                    echo "<p class='titulosp2'>Se encuentran ".count($json_ver_usuarios)." registros en lista </p>";
                    //Ir escribiéndolos con un ciclo for
                    for ($i=0;$i<count($json_ver_usuarios);$i++) {
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$json_ver_usuarios[$i]->Codigo_u."</td>"; //Del array
                        echo "<td>".$json_ver_usuarios[$i]->nombre_u."</td>";
                        echo "<td>".$json_ver_usuarios[$i]->apellido_u."</td>";
                        echo "<td>".$json_ver_usuarios[$i]->correo."</td>";
                        echo "</tr>";
                    }
                  ?>
              </tbody>
          </table>
      </div>
  </div>
</div>

</body>
</html>