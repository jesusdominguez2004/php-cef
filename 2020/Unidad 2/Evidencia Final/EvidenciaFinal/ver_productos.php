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
?>
<!DOCTYPE html>
<html>
<head>
    <title> Ver productos | Almacen</title>
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
<?php
// Incluir las dos otras hojas PHP (El módulo de clase, y la hoja de consultas)
    include 'conexion_almacen.php';
    include 'clase_ingreso.php';  

    // Buscar imágenes y contarlas
    $dato = new clase_ingreso();
    $consulta = $dato->ver_productos();
    $json_ver_productos = json_decode($consulta); 
    $numProductos = count($json_ver_productos);
    echo $numProductos
?>
<!-- HTML -->
<div class="container">
    <center><h2 class="titulosp2"><b>PRODUCTOS</b></h2></center>
    <div class="row">
        <?php
        //
        $tem = 1;
        //
        for ($i=0; $i <count($json_ver_productos) ; $i++) {
        ?> 
            <div class="col-md-4">
            <center><h4 class="titulosp">
            <!-- Nombre --> 
                <?php echo $json_ver_productos[$i]->nombre ?></h4></center>
            <!-- Foto -->
                <p><?php echo "<center><img src='fotos_productos/".$json_ver_productos[$i]->ubicfoto."' width='75%' class='img_responsive img-thumbnail'></center></a>" ?></p>
            <!-- Precio -->
                <p><?php echo "<center> $".$json_ver_productos[$i]->valor_compra."</center>" ?></p>
            </div>
        <?php
        if ($tem == 3) {
            echo "</div><div class='row'>";
            $tem = 1;

        } else {
            $tem = $tem + 1;
        }
        }
        ?>
    </div>
</div>
</body>
</html>