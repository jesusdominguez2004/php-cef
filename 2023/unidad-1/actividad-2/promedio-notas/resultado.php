<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio notas | PHP</title>
    <!-- CSS: Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons: Font Awesome 6.4.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Contenido página -->
    <div class="container mt-3">    
        <h2>Promedio notas <i class="fa-brands fa-php fa-xl"></i></h2>
        <?php

            $nota1 = $_REQUEST["nota1"];
            $nota2 = $_REQUEST["nota2"];
            $nota3 = $_REQUEST["nota3"];
            $todosNumericos = is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3);

            // var_dump($todosNumericos);

            if (!$todosNumericos) {
                $promedio = 0;
                $tipoAlerta = "alert-danger";
                $str = "Campos sin completar...";
            } else {
                $suma = $nota1 + $nota2 + $nota3;
                if ($suma == 0) {
                    $promedio = 0;
                } else {
                    $promedio = $suma / 3;
                }
                $tipoAlerta = "alert-warning";
                $str = "¡El promedio de notas es: <strong>$promedio</strong>!";
            }
            
            echo "<div class='alert $tipoAlerta'>";
            echo $str;
            echo "</div>"
        ?>
        <a href="index.html" class="btn btn-primary">Volver a index.html</a>
    </div>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>