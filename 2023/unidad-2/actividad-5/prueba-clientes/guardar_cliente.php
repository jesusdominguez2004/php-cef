<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 2 | Actividad 5 | PHP</title>
    <!-- CSS: Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons: Font Awesome 6.4.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Contenido página -->
    <?php
        include "conexion.php";
        include "clase_ingreso.php";

        $nombres = $_REQUEST["nombres"];
        $apellidos = $_REQUEST["apellidos"];
        $tipoDocumento = $_REQUEST["tipoDocumento"];
        $numDocumento = $_REQUEST["numDocumento"];
        $direccion = $_REQUEST["direccion"];
        $correo = $_REQUEST["correo"];
        $telefono = $_REQUEST["telefono"];
        $fechaNacimiento = $_REQUEST["fechaNacimiento"];
        
        $dato_entrada = new ClaseIngreso();
        $dato_entrada -> set_nombres($nombres);
        $dato_entrada -> set_apellidos($apellidos);
        $dato_entrada -> set_tipo_doc($tipoDocumento);
        $dato_entrada -> set_num_doc($numDocumento);
        $dato_entrada -> set_dir_casa($direccion);
        $dato_entrada -> set_correo($correo);
        $dato_entrada -> set_telefono($telefono);
        $dato_entrada -> set_fecha_nac($fechaNacimiento);

        $proceso = new ClaseIngreso();
        $consulta = $proceso -> insertar_cliente($dato_entrada);
    ?>

    <div class="container mt-3">    
        <?php
            echo "<div class='shadow-lg mt-4 p-5 bg-primary text-white rounded'>";
            echo "<h2>¡Cliente guardado!</h2>";
            echo "<p><strong>Nombres:</strong> $nombres</p>";
            echo "<p><strong>Apellidos:</strong> $apellidos</p>";
            echo "<p><strong>Tipo documento:</strong> $tipoDocumento</p>";
            echo "<p><strong>Número documento:</strong> $numDocumento</p>";
            echo "<p><strong>Dirección:</strong> $direccion</p>";
            echo "<p><strong>Correo:</strong> $correo</p>";
            echo "<p><strong>Teléfono:</strong> $telefono</p>";
            echo "<p><strong>Fecha nacimiento:</strong> $fechaNacimiento</p>";
            echo "<a href='index.html' class='btn btn-light'>Ir a index.html</a>";
            echo "</div>";
        ?>
    </div>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>