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
    <title> Mostrar productos | Almacen</title>
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
        <!-- Toda a
            cción en PHP termina con ;-->

<?php
# Incluir las dos otras hojas PHP (El módulo de clase, y la hoja de consultas)
    include 'conexion_almacen.php';
    include 'clase_ingreso.php';      
?> 
<!-- table = tabla -->
<!-- th = columna en negrita -->
<!-- tr = fila -->
<!-- td = columna-->
<div class="container">
    <div class="panel_body">
        <div class="table-default">
            <!-- Tabla -->
            <table class="table table-striped" cellspacing="0" width="80%">
                <!-- Encabezado tabla -->
                <thead>
                    <tr>
                        <th width="5%">CÓDIGO</th>
                        <th>NOMBRE</th>
                        <th>GRUPO</th>
                        <th>TIPO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>VALOR COMPRA</th>
                        <th>VALOR VENTA</th>
                        <th>% COMISIÓN</th>
                        <th>VALOR COMISIÓN</th>
                        <th>FECHA</th>
                        <th>NOMBRE ARCHIVO</th>
                        <th>FOTO</th>
                        <th>CÓDIGO PARNER</th>
                        <th>POS</th>
                    </tr>
                </thead>
                <!-- Cuerpo tabla -->
                <tbody>
                    <?php
                        $dato = new clase_ingreso();
                        $consulta = $dato->ver_productos();
                        $json_ver_productos = json_decode($consulta);
                        # Contar registros
                        echo "<p class='titulosp2'> Total productos: ".count($json_ver_productos)." <img src='img/caja.jpg' width='50'></p>";
                        # Insertar los productos encontrados a través de un ciclo for
                        for ($i=0; $i <count($json_ver_productos) ; $i++) { 
                            echo "<tr>";
                            echo "<td align='center'>".$json_ver_productos[$i]->codigo_prod."</td>";
                            echo "<td>".$json_ver_productos[$i]->nombre."</td>";
                            echo "<td>".$json_ver_productos[$i]->grupo_prod."</td>";
                            echo "<td>".$json_ver_productos[$i]->tipo_prod."</td>";
                            echo "<td>".$json_ver_productos[$i]->descripcion."</td>";
                            echo "<td>".$json_ver_productos[$i]->valor_compra."</td>";
                            echo "<td>".$json_ver_productos[$i]->valor_venta."</td>";
                            echo "<td>".$json_ver_productos[$i]->porcentaje_comis."</td>";
                            echo "<td>".$json_ver_productos[$i]->valor_comi."</td>";
                            echo "<td>".$json_ver_productos[$i]->fecha."</td>";
                            echo "<td>".$json_ver_productos[$i]->nomarchivo."</td>";
                            echo "<td><img width='50' src='fotos_productos/".$json_ver_productos[$i]->ubicfoto."'></td>";
                            echo "<td>".$json_ver_productos[$i]->cod_parner."</td>";
                            echo "<td>".$json_ver_productos[$i]->pos."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <!---->
        </div>
    </div>    
</div>
<!---->
</body>
</html>