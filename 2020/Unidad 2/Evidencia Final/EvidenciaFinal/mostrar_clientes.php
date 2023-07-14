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
    <title> Mostrar clientes | Almacén</title>
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
                        <th align="center">ID</th>
                        <th align="center">NOMBRE</th>
                        <th align="center">APELLIDOS</th>
                        <th align="center">TIPO DOCUMENTO</th>
                        <th align="center">IDENTIFICACIÓN</th>
                        <th align="center">FECHA NACIMIENTO</th>
                        <th align="center">DIRECCIÓN</th>
                        <th align="center">TELÉFONO</th>
                        <th align="center">CORREO</th>
                        
                    </tr>
                </thead>
                <!-- Cuerpo tabla -->
                <tbody>
                    <?php
                        $dato = new clase_ingreso();
                        $consulta = $dato->ver_clientes();
                        $json_ver_clientes = json_decode($consulta);
                        # Contar registros
                        echo "<p class='titulosp2'> Total usuarios: ".count($json_ver_clientes)." <img src='img/cliente.jpg' width='40'></p>";
                        # Insertar los clientes encontrados a través de un ciclo for
                        for ($i=0; $i <count($json_ver_clientes) ; $i++) { 
                            echo "<tr>";
                            echo "<td align='center'>".$json_ver_clientes[$i]->id_cliente."</td>";
                            echo "<td>".$json_ver_clientes[$i]->nombre_c."</td>";
                            echo "<td>".$json_ver_clientes[$i]->apellido_c."</td>";
                            echo "<td>".$json_ver_clientes[$i]->tipo_doc."</td>";
                            echo "<td>".$json_ver_clientes[$i]->num_doc."</td>";
                            echo "<td>".$json_ver_clientes[$i]->fecha_nac."</td>";
                            echo "<td>".$json_ver_clientes[$i]->telefono_c."</td>";
                            echo "<td>".$json_ver_clientes[$i]->dir_casa."</td>";
                            echo "<td>".$json_ver_clientes[$i]->correo_c."</td>";
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