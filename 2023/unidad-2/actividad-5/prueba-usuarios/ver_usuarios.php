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
    ?>
    <div class="container mt-3">    
        <h2>Unidad 2 | Actividad 5 | Prueba usuarios <i class="fa-brands fa-php fa-xl"></i></h2>
        <div class="panel-body">
            <div class="table-default">
                <table id="example" class="table table-striped" cellspacing="0" width="80%">
                    <thead>
                        <tr>
                            <th style="text-align: center;" width="15%">CÓDIGO</th>
                            <th style="text-align: center;" width="15%">NOMBRE</th>
                            <th style="text-align: center;" width="15%">APELLIDO</th>
                            <th style="text-align: center;" width="15%">CORREO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $dato = new ClaseIngreso();
                            $consulta = $dato -> ver_usuarios();
                            $json_usuarios = json_decode($consulta);
                            
                            echo "<p class='title-p2'>¡Se encuentran ". count($json_usuarios) . " registros en lista!</p>";

                            for ($i = 0; $i < count($json_usuarios); $i++) {
                                echo "<tr>";
                                echo "<td style='text-align: center;'>" . $json_usuarios[$i] -> codigo_u . "</td>";
                                echo "<td style='text-align: center;'>" . $json_usuarios[$i] -> nombre_u . "</td>";
                                echo "<td style='text-align: center;'>" . $json_usuarios[$i] -> apellido_u . "</td>";
                                echo "<td style='text-align: center;'>" . $json_usuarios[$i] -> correo . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <a href="index.html" class="btn btn-primary">Volver a index.html</a>
        <br><br>
        <div class="alert alert-warning">
            <strong>Nota:</strong> Tabla "prueba_tb_usuarios"
        </div>
    </div>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>