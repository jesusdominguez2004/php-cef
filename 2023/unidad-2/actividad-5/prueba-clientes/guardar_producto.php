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

        if (isset($_REQUEST["nombre_p"])) {
            $nombre_p = $_REQUEST["nombre_p"];
            $precio_p = $_REQUEST["precio_p"];
            $file_size = $_FILES["foto_p"]["size"];
            $file_name = trim($_FILES["foto_p"]["name"]);
            $file_name = substr($file_name, -20);
            $file_name = preg_replace("/ /", "", $file_name);
            $path = "../img/";

            $formatos_validos = preg_match("/.jpg/", $file_name) ||
                                preg_match("/.JPG/", $file_name) ||
                                preg_match("/.gif/", $file_name) ||
                                preg_match("/.GIF/", $file_name) ||
                                preg_match("/.png/", $file_name) ||
                                preg_match("/.PNG/", $file_name);
            if ($formatos_validos) {
                $upload_file = $path . $file_name;
                $foto_guardar = $file_name;
                if (move_uploaded_file($_FILES["foto_p"]["tmp_name"], $upload_file)) {
                    $dato_entrada = new ClaseIngreso();
                    $dato_entrada -> set_nombre_p($nombre_p);
                    $dato_entrada -> set_foto_p($file_name);
                    $dato_entrada -> set_precio_p($precio_p);
                    $proceso = new ClaseIngreso();
                    $consulta = $proceso -> insertar_producto($dato_entrada);
                    $txt_alert = "¡Se ha guardado el producto!";
                    $class_alert = "success";
                } else {
                    $txt_alert = "Error en la conexión con el servidor...";
                    $class_alert = "warning";
                }
            } else {
                $txt_alert = "Formato no válidos, solo .jpg, .gif y .png...";
                $class_alert = "danger";
            }
        }
    ?>

    <div class="container mt-3">    
        <h2>Unidad 2 | Actividad 5 | Prueba clientes <i class="fa-brands fa-php fa-xl"></i></h2>
        <div class="alert alert-<?php echo $class_alert; ?>">
            <strong>Sistema:</strong> 
            <?php echo $txt_alert; ?>
        </div>
        <div class="alert alert-warning">
            <strong>Nota:</strong> Tabla "prueba_tb_productos"
        </div>
        <div class="btn-group">
            <a href="productos.html" class="btn btn-success">Insertar otro</a>
            <a href="ver_productos.php" class="btn btn-dark">Ver productos</a>
            <a href="index.html" class="btn btn-primary">index.html</a>
        </div>
    </div>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>