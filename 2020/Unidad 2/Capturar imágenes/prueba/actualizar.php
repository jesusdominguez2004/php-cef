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
      //De mostrar_busqueda.php a actualizar.php
      $Codigo_u = $_REQUEST['Codigo_u'];
      $nombre = $_REQUEST['nombre'];
      $apellido = $_REQUEST['apellido'];
      $correo = $_REQUEST['correo'];
      //De actualizar.php a clase_ingreso
      $dato_entrada = new clase_buscarUsuario();
      $dato_entrada -> setCodigo_u($Codigo_u);
      $dato_entrada -> setNombre($nombre);
      $dato_entrada -> setApellidos($apellido);
      $dato_entrada -> setCorreo($correo);  

      $proceso = new clase_buscarUsuario();
      $consulta = $proceso -> Consulta_actualizar_usuario($dato_entrada);              
?>
<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <br><br><br><br><br><br>
        <?php 
            echo "Se ha actualizado el usuario: ".$nombre." ".$apellido;
        ?>
        </div>
    <div class="col-sm-4"></div>
  </div>
</div>
</body>
</html>