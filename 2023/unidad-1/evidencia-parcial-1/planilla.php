<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 1 | Evidencia Parcial 1 | PHP</title>
    <!-- CSS: Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons: Font Awesome 6.4.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Contenido página -->
    <div class="container mt-3">    
        <?php
            $nombreTrabajador = $_REQUEST["nombre"];
            $horasLaboradas = $_REQUEST["horas"];
            $valorTarifa = $_REQUEST["tarifa"];

            if ($horasLaboradas >= 240) {
                $total = $horasLaboradas * $valorTarifa;
                $bonus = false;
            } else {
                $total = $horasLaboradas * $valorTarifa * 1.15;
                $bonus = true;
            }

            echo "<div class='mt-4 p-5 bg-primary text-white rounded'>";
            echo "<h2>Mensaje del sistema</h2>";
            echo "<p>Nombre trabajador: $nombreTrabajador</p>";
            echo "<p>Horas laboradas: $horasLaboradas</p>";
            echo "<p>Valor tarifa: $ $valorTarifa</p>";

            if ($bonus) {
                $descuento = $horasLaboradas * $valorTarifa * 0.15;
                echo "<p>Bonus: 15% ($ $descuento)</p>";
            } else {
                echo "<p>Bonus: NO ($ 0)</p>";
            }

            echo "<p>Total a pagar: $ $total</p>";
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