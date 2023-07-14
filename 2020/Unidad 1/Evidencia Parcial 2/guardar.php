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
<!-- Resultado "Guardar Cliente" -->
        <!-- Toda variable en PHP empieza con $-->
        <!-- Toda acción en PHP termina con ;-->
        <?php 
            //Incluir las dos otras hojas PHP (El módulo de clase - y Ingreso)
            include 'conexion.php';
            include 'clase_ingreso.php';
            //Capturar información
            $nombre = $_REQUEST['nombre'];
            $apellidos = $_REQUEST['apellidos'];
            $tipoDocumento = $_REQUEST['tipoDocumento'];
            $numDocumento = $_REQUEST['numDocumento'];
            $dirección = $_REQUEST['dirección'];
            $correo = $_REQUEST['correo'];
            $teléfono = $_REQUEST['teléfono'];
            $fechaNacimiento = $_REQUEST['fechaNacimiento'];
            //Del formulario al clase_ingreso
            $dato_entrada = new clase_ingreso();
            $dato_entrada->setNombre($nombre);
            $dato_entrada->setApellidos($apellidos);
            $dato_entrada->setTipoDoc($tipoDocumento);
            $dato_entrada->setNumDoc($numDocumento);
            $dato_entrada->setDirección($dirección);     
            $dato_entrada->setCorreo($correo);
            $dato_entrada->setTeléfono($teléfono);
            $dato_entrada->setFechaNacimiento($fechaNacimiento);
            
            $proceso = new clase_ingreso();
            $consulta = $proceso->Consulta_crear_usuario($dato_entrada);
        ?>
<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-4"></div>
    <div class="col-sm-4"><br><br><br><br><br>
        <?php
            echo "Se ha guardado el usuario ".$nombre." ".$apellidos."<br>";
            echo "- Número de documento: ".$numDocumento."<br>";
            echo "- Fecha de nacimiento: ".$fechaNacimiento."<br>";
            echo "- Correo: ".$correo."<br>";
            echo "- Teléfono: ".$teléfono."<br>";
            echo "- dirección: ".$dirección."<br>";
        ?>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
<!---->
</body>
</html>