<!DOCTYPE html>
<html>
<head>
    <title>Resultados crear producto | Prueba</title>
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
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
<?php
  // Incluir hojas PHP
  include 'conexión_prueba.php';
  include 'clase_buscarUsuario.php';
  // Crear variables
  $nombre = $_REQUEST['nombre'];
  $precio = $_REQUEST['precio'];
  // Archivo y tamaño
  $filesize = $_FILES['foto']['size'];
  // Convertir todo en cadena (trim)
  $filename = trim($_FILES['foto']['name']);
  // Recortar el nombre (Máximo 20 caracteres)
  $filename = substr($filename, -20);
  //Borrar los / y los espacios del la ruta guardada
  $filename = preg_replace("/ /", "", $filename);
  //Carpeta de nuestra bases de datos
  $to="img_productos/";

  // Asaignar formatos válidos
  //  preg_match("/.formato/", $nuestraCadenaImg)
  // "||" = or

    if((preg_match("/.jpg/", $filename)) || (preg_match("/.JPG/", $filename)) || (preg_match("/.gif/", $filename)) || (preg_match("/.GIF/", $filename)) || (preg_match("/png/", $filename)) || (preg_match("/.PNG/", $filename)))
    {
      $uploadfile = $to.$filename;
      $fotoGuardar = $filename;

      if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {

          $dato_entrada = new clase_buscarUsuario();
          $dato_entrada -> setNombre_p($nombre);
          $dato_entrada -> setFoto($filename);
          $dato_entrada -> setPrecio($precio);
          
          $proceso = new clase_buscarUsuario();
          $consulta = $proceso -> Consulta_crear_producto($dato_entrada);
          
          echo "<center><div class='alert alert-success'>Producto guardado exitosamente</div></center>";
      } else {
        echo "<center><div class='alert alert-danger'>Error al intentar guardar la imagen, Error de conexión</div></center>";
      }   

    } else {
      echo "<center><div class='alert alert-danger'>Solo se permiten imágenes en formato: .jpg, .gif, .png</div></center>";
    }
?>
</div>
<div class="col-sm-4"></div>
</div>
</body>
</html>