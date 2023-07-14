<?php
//  Llamar la función sesión
session_start();
// "!" = Si no, negación
if (!isset($_SESSION['idUser'])){
// Dirijir a
header ("Location:login.php");
}else{ // Si está creada la sesión, llamar variables compartidas
$id_usuario = $_SESSION['idUser'];
$login_usuario = $_SESSION['loginUser'];
$id_perfil = $_SESSION['perfilUser'];
$nombre_usuario = $_SESSION['nombreUser'];
$apellido_usuario = $_SESSION['apellidoUser'];
}
if ($id_perfil == "Cliente"){
header ("Location:menú.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> Resultados Crear Cliente | Almacen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Mi hoja CSS -->
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<!-- Resultado "Guardar Usuario" -->
        <!-- Toda variable en PHP empieza con $-->
        <!-- Toda acción en PHP termina con ;-->

        <?php
        # Incluir las dos otras hojas PHP (El módulo de clase, y la hoja de consultas)
            include 'conexion_almacen.php';
            include 'clase_ingreso.php';      
            
            # Capturar información del formulario
            $nombre_c = $_REQUEST['nombre_c'];
            $apellidos_c = $_REQUEST['apellidos_c'];
            $tipo_doc = $_REQUEST['tipo_doc'];
            $num_doc = $_REQUEST['num_doc'];
            $fecha_nac = $_REQUEST['fecha_nac'];
            $dir_casa = $_REQUEST['dir_casa'];
            $telefono_c = $_REQUEST['telefono_c'];
            $correo_c = $_REQUEST['correo_c'];
            
            # Validar campos vacios
            if ($nombre_c === "" or $apellidos_c === "" or $tipo_doc === "" or $num_doc === "" or $fecha_nac === "" or $dir_casa === "" or $telefono_c === "" or $correo_c === "") {
                echo "<center><div class='alert alert-danger'>No puede guardar hay campos vacíos</div></center>";
            }else {  
            # Del formulario al clase_ingreso
            $dato_entrada = new clase_ingreso();
            $dato_entrada->setNombre_c($nombre_c);
            $dato_entrada->setApellidos_c($apellidos_c);
            $dato_entrada->setTipo_doc($tipo_doc);
            $dato_entrada->setNumdoc($num_doc);
            $dato_entrada->setFechaNac($fecha_nac);            
            $dato_entrada->setDirCasa($dir_casa);
            $dato_entrada->setTelefono_c($telefono_c);
            $dato_entrada->setCorreo_c($correo_c);

            $proceso = new clase_ingreso();
            $consulta = $proceso->Consulta_crear_cliente($dato_entrada);
        ?>
<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-4"></div>
    <div class="col-sm-4"><br><br><br><br><br>
        <?php
            echo "Se ha guardado el cliente: "."<br>";
            echo "<i>".$nombre_c." ".$apellidos_c."</i><br>";            
            echo "- Tipo de documento: ".$tipo_doc."<br>";
            echo "- Número de documento: ".$num_doc."<br>";    
            echo "- Fecha de nacimiento: ".$fecha_nac."<br>";
            echo "- Teléfono: ".$telefono_c."<br>";
            echo "- Dirección casa: ".$dir_casa."<br>";
            echo "- Correo: ".$correo_c."<br><br>";

            echo "<center><img src='img/reciclar.jpg' width='50'><img src='img/Herramienta y seguridad.png' width='50'</center>";
            }        
        ?>
    </div>
    <div class="col-sm-4"><br><br><br><br><br><br>
        <!-- Hipervínculo con clase botón que llevará a inicio 'menú.php' -->
        <a href="menú.php" class="btn btn-success">Volver al menú</a><br><p></p>
        <!-- Hipervínculo con clase botón que llevará a 'crear_clientes.php' -->
        <a href="crear_clientes.php" class="btn btn-dark">Seguir creando</a>
    </div>
  </div>
</div>
<!---->
</body>
</html>