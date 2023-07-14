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
    <title>Editar clientes | Almacen </title>
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
            # Incluir las otras dos hojas
            include 'conexion_almacen.php';
            include 'clase_ingreso.php';
            # Capturar información del formulario
            $id_cliente = $_REQUEST['id_cliente'];
            $nombre_c = $_REQUEST['nombre_c'];
            $apellidos_c = $_REQUEST['apellidos_c'];
            $tipo_doc = $_REQUEST['tipo_doc'];
            $num_doc = $_REQUEST['num_doc'];
            $fecha_nac = $_REQUEST['fecha_nac'];
            $dir_casa = $_REQUEST['dir_casa'];
            $telefono_c = $_REQUEST['telefono_c'];
            $correo_c = $_REQUEST['correo_c'];

            #Solucionar error de los Select
                   $s1 = "";
                   $s2 = "";
                   $s3 = "";
                # Validar Control Tipo_doc
                if ($tipo_doc == "Cédula") {
                   $s1 = "selected=''";
                }
                if ($tipo_doc == "Tarjeta de identidad") {
                   $s2 = "selected=''";
                }
                if ($tipo_doc == "Otro") {
                   $s3 = "selected=''";
                }
                # Los "}" terminan al final (Línea)                  
        ?>
<div class="container">
        <!-- Formulario -->    
        <center><h3> Resultados  <img src="img/buscar.png" width="50"></h3></center>
</div>
<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-4"></div>
    <div class="col-sm-4">

        <form method="POST" name="formResultado" action="actualizar_clientes.php">

        <div class="row">
        <?php
          echo "<div class='container'><a><strong>ID Cliente: </strong></a><input readonly name='id_cliente' value='$id_cliente'></div>";
        ?>
       </div><br>

        <!-- Primero input "Nombre" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" name="nombre_c" value="<?php echo $nombre_c?>" class="form-control">
        </div>

        <!-- Segundo input "Apellidos" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Apellidos</label>
          <input type="text" placeholder="Ingrese apellidos" name="apellidos_c" value="<?php echo $apellidos_c?>" class="form-control">
        </div>
        
        <!-- Tercero Select "Tipo documento" -->
        <div class="form-group">
          <label for="sel1">Tipo documento</label>
            <select class="form-control" placeholder="Seleccione tipo de documento" name="tipo_doc">
                   <option value="Cédula" <?php echo $s1?>>Cédula</option>
                   <option value="Tarjeta de identidad" <?php echo $s2?>>Tarjeta de identidad</option>
                   <option value="Otro" <?php echo $s3?>>Otro</option>
           </select>
        </div>

         <!-- Cuarto input "Número documento" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Número de documento</label>
          <input type="number" placeholder="Ingrese número documento" name="num_doc" value="<?php echo $num_doc?>" class="form-control">
        </div>     

        <!-- Quinto input "Fecha nacimiento" Tipo "date" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Fecha de nacimiento</label>
          <input type="date" placeholder="Ingrese fecha nacimiento" name="fecha_nac" value="<?php echo $fecha_nac?>" class="form-control">
        </div>

        <!-- Sexto input "Dirección" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Dirección casa</label>
          <input type="text" placeholder="Ingrese la dirección" name="dir_casa" value="<?php echo $dir_casa?>" class="form-control">
        </div>

        <!-- Septimo input "Teléfono" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Teléfono</label>
          <input type="text" placeholder="Ingrese teléfono" name="telefono_c" value="<?php echo $telefono_c?>" class="form-control">
        </div>

        <!-- Octavo input "Correo" Tipo "email" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Correo</label>
          <input type="email" placeholder="Ingrese correo" name="correo_c" value="<?php echo $correo_c?>" class="form-control">
        </div>

        <!-- Botón que llevará al action (actualizar_clientes.php) -->
        <button type="submit" class="btn btn-success">Guardar</button>
        <!-- Hipervínculo con clase botón que llevará a inicio 'eliminar_clientes.php' -->
        <a href="buscar_clientes.html" class="btn btn-dark">Cancelar</a>
        </form>
    </div>    
    <div class="col-sm-4"></div>
  </div>
</div>
<!---->
</body>
</html>                                                                        