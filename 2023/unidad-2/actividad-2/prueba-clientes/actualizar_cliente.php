<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 2 | Actividad 2 | PHP</title>
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

        $codigo = $_REQUEST["codigo"];
        $nombre = $_REQUEST["nombre"];
        $apellido = $_REQUEST["apellido"];
        $correo = $_REQUEST["correo"];

        $dato_entrada = new ClaseIngreso();
        $dato_entrada -> set_codigo_u($codigo);
        $dato_entrada -> set_nombre_u($nombre);
        $dato_entrada -> set_apellido_u($apellido);
        $dato_entrada -> set_correo($correo);

        $proceso = new ClaseIngreso();
        $consulta = $proceso -> actualizar_usuario($dato_entrada);
    ?>

    <div class="container mt-3">    
        <h2>Unidad 2 | Actividad 2 | Prueba clientes <i class="fa-brands fa-php fa-xl"></i></h2>
        <div class="alert alert-success">
            <strong>Sistema:</strong> 
            ¡Se ha actualizado el usuario <?php echo "$nombre $apellido ($codigo, $correo)!"?> 
        </div>
        <div class="alert alert-warning">
            <strong>Nota:</strong> Tabla "prueba_tb_usuarios"
        </div>
        <a href="buscar_usuario.php" class="btn btn-success">buscar_usuario.php</a>
        <a href="index.html" class="btn btn-primary">index.html</a>
    </div>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>