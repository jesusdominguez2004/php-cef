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

        if (isset($_REQUEST["codigo"])) {
            $codigo_buscar = $_REQUEST["codigo"];
            $usuario_buscar = new ClaseIngreso();
            $usuario_buscar -> set_codigo_u($codigo_buscar);
            $dato = new ClaseIngreso();
            $consulta = $dato -> buscar_usuario($usuario_buscar);
            $array_usuarios = json_decode($consulta);
            if (count($array_usuarios) > 0) {
                $codigo_u = $array_usuarios[0] -> codigo_u;
                $nombre_u = $array_usuarios[0] -> nombre_u;
                $apellido_u = $array_usuarios[0] -> apellido_u;
                $correo = $array_usuarios[0] -> correo;
    ?>

    <div class="container mt-3">    
        <h2>Unidad 2 | Actividad 5 | Prueba usuarios <i class="fa-brands fa-php fa-xl"></i></h2>
        <form role="form" action="elimina.php" method="post" name="formulario">
            <div class="mb-3 mt-3">
                <label for="codigo">Código usuario:</label>
                <input type="number" class="form-control" required readonly value="<?php echo $codigo_u; ?>" id="codigo" name="codigo">
            </div>

            <div class="mb-3 mt-3">
                <label for="nombre">Nombre usuario:</label>
                <input type="text" class="form-control" required readonly value="<?php echo $nombre_u; ?>" id="nombre" name="nombre">
            </div>

            <div class="mb-3 mt-3">
                <label for="apellido">Apellido usuario:</label>
                <input type="text" class="form-control" required readonly value="<?php echo $apellido_u; ?>" id="apellido" name="apellido">
            </div>

            <div class="mb-3 mt-3">
                <label for="correo">Correo usuario:</label>
                <input type="text" class="form-control" required readonly value="<?php echo $correo; ?>" id="correo" name="correo">
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn btn-danger">Eliminar usuario</button>
                <a href="busca_elimina.php" class="btn btn-success">Buscar otro</a>
                <a href="index.html" class="btn btn-primary">Volver a index.html</a>
            </div>
        </form>

        <br>
        <div class="alert alert-warning">
            <strong>Nota:</strong> Tabla "prueba_tb_usuarios"
        </div>
    </div>

    <?php 
            } else {
                echo "<div class='container mt-3'>";
                echo "<h2>Unidad 2 | Actividad 5 | Prueba usuarios <i class='fa-brands fa-php fa-xl'></i></h2>";
                echo "<div class='alert alert-danger'>";
                echo "<strong>Sistema:</strong> Usuario no existe... (codigo_u = $codigo_buscar)";
                echo "</div>";
                echo "<a href='busca_elimina.php' class='btn btn-success'>Buscar otro</a>";
                echo "</div>";
                $codigo_u = "";
                $nombre_u = "";
                $apellido_u = "";
                $correo = ""; 
            }
        }
    ?>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>