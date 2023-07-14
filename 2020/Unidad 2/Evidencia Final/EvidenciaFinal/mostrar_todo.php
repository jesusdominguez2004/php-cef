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
    <title>Mostrar todo | Almacén</title>
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
<!-- Tabla Productos -->
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
<!-- Tabla Usuarios -->
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
                        <th align="center">TELÉFONO</th>
                        <th align="center">LOGIN</th>
                        <th align="center">CONTRASEÑA</th>
                        <th align="center">ID PERFÍL</th>
                    </tr>
                </thead>
                <!-- Cuerpo tabla -->
                <tbody>
                    <?php
                        $dato = new clase_ingreso();
                        $consulta = $dato->ver_usuarios();
                        $json_ver_usuarios = json_decode($consulta);
                        # Contar registros
                        echo "<p class='titulosp2'> Total usuarios: ".count($json_ver_usuarios)." <img src='img/usuario 1.png' width='35'></p>";
                        # Insertar los productos encontrados a través de un ciclo for
                        for ($i=0; $i <count($json_ver_usuarios) ; $i++) { 
                            echo "<tr>";
                            echo "<td align='center'>".$json_ver_usuarios[$i]->id_usuario."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->nombre_usuario."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->apellido_usuario."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->tipo_doc."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->identificacion."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->telefono_u."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->login_usuario."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->password_usuario."</td>";
                            echo "<td>".$json_ver_usuarios[$i]->id_perfil."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <!---->
        </div>
    </div>    
</div>
<!-- Tabla Clientes -->
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
                        echo "<p class='titulosp2'> Total clientes: ".count($json_ver_clientes)." <img src='img/cliente.jpg' width='50'></p>";
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
</body>
</html>