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
if ($id_perfil == "Cliente"){
header ("Location:menú.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultados crear producto | Almacen</title>
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
        <!-- Toda variable en PHP empieza con $-->
        <!-- Toda a
            cción en PHP termina con ;-->

        <?php
        // Incluir las dos otras hojas PHP (El módulo de clase, y la hoja de consultas)
            include 'conexion_almacen.php';
            include 'clase_ingreso.php';      
            
            // Capturar información del formulario
            $nombre = $_REQUEST['nombre'];
            $grupo_prod = $_REQUEST['grupo_prod'];
            $tipo_prod = $_REQUEST['tipo_prod'];
            $descripcion = $_REQUEST['descripcion'];
            $valor_compra = $_REQUEST['valor_compra'];
            $valor_venta = $_REQUEST['valor_venta'];
            $porcentaje_comis = $_REQUEST['porcentaje_comis'];
            $valor_comi = $_REQUEST['valor_comi'];
            $fecha = $_REQUEST['fecha'];
            $nomarchivo = $_REQUEST['nomarchivo'];
            $cod_parner = $_REQUEST['cod_parner'];
            $pos = $_REQUEST['pos'];

            // Variables para guardar foto
            // trim = convertir en cadena de texto
            $nombreFoto = trim($_FILES['ubicfoto']['name']);
            // Recortar nombre foto cadena, hasta 20
            $nombreFoto = substr($nombreFoto, -25);
            $nombreFoto = preg_replace("/ /", "", $nombreFoto);
            
            // Validar campos vacios
            if ($nombre === "" or $grupo_prod === "" or $tipo_prod === "" or $descripcion === "" or $valor_compra === "" or $valor_venta === "" or $porcentaje_comis === "" or $valor_comi === "" or $fecha === "" or $nomarchivo === "" or $nombreFoto === "" or $cod_parner === "" or $pos === ""){
                // Mensaje de error
                echo "<center><div class='alert alert-danger'>No puede guardar hay campos vacíos</div></center>";
            }else {  
            // Validar tipo de foto (.jpg, .gif, .png)
            // "||" = or
            if ((preg_match("/.jpg/", $nombreFoto)) || (preg_match("/.JPG/", $nombreFoto)) || (preg_match("/.gif/", $nombreFoto)) || (preg_match("/.GIF/", $nombreFoto)) || (preg_match("/.png/", $nombreFoto)) || (preg_match("/.PNG/", $nombreFoto))) {
                
            // Guardar foto en la carpeta de la base de datos
            $carpetaFoto = "fotos_productos/";
            $uploadFoto = $carpetaFoto.$nombreFoto;
            $fotoGuardar = $nombreFoto;

            if (move_uploaded_file($_FILES['ubicfoto']['tmp_name'], $uploadFoto)) {
            // Del formulario al clase_ingreso
            $dato_entrada = new clase_ingreso();
            $dato_entrada->setNombre_prod($nombre);
            $dato_entrada->setGrupo_prod($grupo_prod);
            $dato_entrada->setTipo_prod($tipo_prod);
            $dato_entrada->setDescripcion($descripcion);
            $dato_entrada->setValor_compra($valor_compra);            
            $dato_entrada->setValor_venta($valor_venta);
            $dato_entrada->setPorcentaje_comis($porcentaje_comis);
            $dato_entrada->setValor_comi($valor_comi);
            $dato_entrada->setFecha($fecha);
            $dato_entrada->setNombre_archivo($nomarchivo);
            $dato_entrada->setUbicfoto($fotoGuardar);
            $dato_entrada->setCod_parner($cod_parner);
            $dato_entrada->setPos($pos);

            $proceso = new clase_ingreso();
            $consulta = $proceso->Consulta_crear_producto($dato_entrada);
        ?>
<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-3"></div>
    <div class="col-sm-4"><br>
        <?php
            echo "Se ha guardado el producto: "."<br>";
            echo "<i>".$nombre."</i><br>";            
            echo "- Grupo del producto: ".$grupo_prod."<br>";
            echo "- Tipo del producto: ".$tipo_prod."<br>";    
            echo "- Descripción: ".$descripcion."<br>";
            echo "- Valor de compra: ".$valor_compra."<br>";
            echo "- Valor de venta: ".$valor_venta."<br>";
            echo "- Porcentaje de comisión: ".$porcentaje_comis."%"."<br>";
            echo "- Valor de comisión: ".$valor_comi."<br>";
            echo "- Fecha: ".$fecha."<br>";
            echo "- Nombre archivo: ".$nomarchivo."<br>";
            echo "- Foto: ".$fotoGuardar."<br>";
            echo "- Código parner: ".$cod_parner."<br>";
            echo "- Pos: ".$pos."<br><br>";

            echo "<center><img src='img/reciclar.jpg' width='50'><img src='img/Herramienta y seguridad.png' width='50'></center>";
            
            } else {
                // Mensaje de error
                echo "<center><div class='alert alert-danger'>Error al guardar foto</div></center>";}
            } else {
                // Mensaje de error
                echo "<center><div class='alert alert-danger'>Solo se permíten imgs con formato: .jpg, .gif y .png</div></center>";}
            
            }
        ?>
    </div>
    <div class="col-sm-4"><br><br><br><br><br><br>
        <!-- Hipervínculo con clase botón que llevará a inicio 'menú.php' -->
        <a href="menú.php" class="btn btn-success">Volver al menú</a><br><p></p>
        <!-- Hipervínculo con clase botón que llevará a 'crear_productos.php' -->
        <a href="crear_productos.php" class="btn btn-dark">Seguir creando</a>
    </div>
  </div>
</div>
<!---->
</body>
</html>