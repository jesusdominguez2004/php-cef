<?php
    session_start();
    ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 2 | Actividad 6 | PHP</title>
    <!-- CSS: Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons: Font Awesome 6.4.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Contenido página -->
    <div class="container mt-3">    
        <h2>Unidad 2 | Actividad 6 | Prueba usuarios <i class="fa-brands fa-php fa-xl"></i></h2>
        <form role="form" action="login.php" method="post" name="formulario">
            <div class="mb-3 mt-3">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" required id="usuario" name="usuario" placeholder="Ingrese su usuario">
            </div>
            <div class="mb-3 mt-3">
                <label for="clave">Clave:</label>
                <input type="password" class="form-control" required id="clave" name="clave" placeholder="Ingrese su clave">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Ingresar</button>
                <a href="index.html" class="btn btn-primary">Volver a index.html</a>
            </div>
        </form>

        <br>
        <div class="alert alert-warning">
            <strong>Nota:</strong> Tabla "prueba_tb_login"
        </div>
    </div>


    <?php 
        include "conexion.php";
        include "clase_ingreso.php";

        if (isset($_REQUEST["usuario"])) {
            $usuario = $_REQUEST["usuario"];
            $clave = $_REQUEST["clave"];
            $nuevoLogin = new ClaseIngreso();
            $nuevoLogin -> set_usuario($usuario);
            $nuevoLogin -> set_clave($clave);
            $proceso = new ClaseIngreso();
            $consulta = $proceso -> validar_usuario($nuevoLogin);
            $json_usuarios = json_decode($consulta);
            if (count($json_usuarios) == 1) {
                $_SESSION["id_user"] = $json_usuarios[0] -> cod_usuario;
                $_SESSION["nombre_user"] = $json_usuarios[0] -> nombre_usuario;
                header("Location:index.html");
            } else {
                echo "<script type='txt/javascript'>alert('Usuario o clave incorrectos...')</script>";
            }
        }
    ?>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>

<?php 
    ob_end_flush();
?>