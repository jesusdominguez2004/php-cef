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
    <title>Editar usuarios | Almacen </title>
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
            # Del formulario a variables PHP
            $id_usuario = $_REQUEST['id_usuario'];
            $nombre_u = $_REQUEST['nombre_u'];
            $apellidos_u = $_REQUEST['apellidos_usuario'];
            $tipo_doc = $_REQUEST['tipo_doc'];
            $identificacion = $_REQUEST['identificacion'];
            $telefono_u = $_REQUEST['telefono_u'];
            $login_usuario = $_REQUEST['login_usuario'];
            $password_usuario = $_REQUEST['password_usuario'];
            $id_perfil = $_REQUEST['id_perfil'];
            
            #Solucionar error de los Select
                   $s1 = "";
                   $s2 = "";
                   $s3 = "";
                   
                   $idp1 = "";
                   $idp2 = "";
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
                # Validar Control ID_Perfíl
                if ($id_perfil == "Administrador") {
                   $idp1 = "selected=''";
                }
                if ($id_perfil == "Cliente") {
                   $idp2 = "selected=''";
                } 
                # Los "}" terminan al final (Línea)                  
        ?>
<div class="container">
        <!-- Formulario -->    
        <center><h3> Resultados  <img src="img/buscar.png" width="50"></h3></center>
</div>
<form method="POST" action="actualizar_usuarios.php">
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-4">
    <div class="form-group">
        <?php
          echo "<div class='container'><a><strong>ID Usuario: </strong></a><input readonly name='id_usuario' value='$id_usuario'></div>";
        ?>
    </div>
  </div>
  <div class="col-sm-4"></div>
  <div class="col-sm-2"></div>
      
</div>
<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-2"></div>
    <div class="col-sm-4">

        
          
        <!-- Primero input "Nombre" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" name="nombre_u"  value="<?php echo $nombre_u?>" class="form-control">
        </div>

        <!-- Segundo input "Apellidos" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Apellidos</label>
          <input type="text" placeholder="Ingrese apellidos" name="apellidos_usuario" value="<?php echo $apellidos_u?>" class="form-control">
        </div>
        
        <!-- Tercero Select "Tipo documento" -->
        <div class="form-group">
          <label for="sel1">Tipo documento</label>
              <select class="form-control" placeholder="Seleccione tipo de documento" name='tipo_doc'>
                         <option value="Cédula" <?php echo $s1?>>Cédula</option>
                         <option value="Tarjeta de identidad" <?php echo $s2?>>Tarjeta de identidad</option>
                         <option value="Otro" <?php echo $s3?>>Otro</option>
              </select>
        </div>

         <!-- Cuarto input "Número documento" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Número de documento</label>
          <input type="number" placeholder="Ingrese número documento" name="identificacion" value="<?php echo $identificacion?>" class="form-control">
        </div> 
    </div>

    <div class="col-sm-4">
      <!-- Septimo input "Teléfono" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Teléfono</label>
          <input type="text" placeholder="Ingrese teléfono" name="telefono_u" value="<?php echo $telefono_u?>" class="form-control">
        </div>

        <!-- Quinto input "Login usuario" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Login del usuario</label>
          <input type="text" placeholder="Ingrese el login" name="login_usuario" value="<?php echo $login_usuario?>" class="form-control">
        </div>

        <!-- Sexto input "Contraseña" Tipo "Text" -->
        <div class="form-group"> 
          <label for="psw">Contraseña</label>
          <input type="text" placeholder="Ingrese contraseña" name="password_usuario" value="<?php echo $password_usuario?>" class="form-control">
        </div>

        <!-- Optavo Select Tipo "Text" -->
        <div class="form-group">
          <label for="sel1">ID Perfíl</label>
            <select class="form-control" placeholder="Seleccione ID Perfíl" name="id_perfil">
                   <option value="Administrador" <?php echo $idp1 ?>>Administrador</option>
                   <option value="Cliente" <?php echo $idp2 ?>>Cliente</option>
           </select>
        </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <center>
        <!-- Botones -->
        <!-- Hipervínculo con estilo botón ir a "action" -->
        <button type="submit" class="btn btn-success">Guardar</button>
        <!-- Hipervínculo con clase botón que llevará a inicio 'crear_usuarios.html' -->
        <a href="buscar_usuarios.html" class="btn btn-dark">Cancelar</a>
     </center>
    </div>
  </div>
</div>
<!---->
</body>
</html>                                                                        