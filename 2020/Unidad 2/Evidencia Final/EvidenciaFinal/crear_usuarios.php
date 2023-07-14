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
    <title>Crear usuarios | Almacen</title>
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

<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-3"></div>
    <div class="col-sm-6"> <br>

    <!-- Formulario centrado -->
    <center><h2> Crear usuario - Almacen <img src='img/usuario 1.png' height='35'></h2></center>
        
        <form method="POST" action="guardar_usuarios.php">

        <!-- Primero input "Nombre" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" name="nombre_u" class="form-control">
        </div>

        <!-- Segundo input "Apellidos" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Apellidos</label>
          <input type="text" placeholder="Ingrese apellidos" name="apellidos_usuario" class="form-control">
        </div>
        
        <!-- Tercero Select "Tipo documento" -->
        <div class="form-group">
          <label for="sel1">Tipo documento</label>
            <select class="form-control" placeholder="Seleccione tipo de documento" name="tipo_doc">
                   <option value="Cédula">Cédula</option>
                   <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                   <option value="Otro">Otro</option>
           </select>
        </div>

         <!-- Cuarto input "Número documento" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Número de documento</label>
          <input type="number" placeholder="Ingrese número documento" name="identificacion" class="form-control">
        </div>     

        <!-- Septimo input "Teléfono" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Teléfono</label>
          <input type="text" placeholder="Ingrese teléfono" name="telefono_u" class="form-control">
        </div>

        <!-- Quinto input "Login usuario" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Login del usuario</label>
          <input type="text" placeholder="Ingrese el login" name="login_usuario" class="form-control">
        </div>

        <!-- Sexto input "Contraseña" Tipo "Text" -->
        <div class="form-group"> 
          <label for="psw">Contraseña</label>
          <input type="password" placeholder="Ingrese contraseña" name="password_usuario" class="form-control">
        </div>

        <!-- Optavo Select Tipo "Text" -->
        <div class="form-group">
          <label for="sel1">ID Perfíl</label>
            <select class="form-control" placeholder="Seleccione ID Perfíl" name="id_perfil">
                   <option value="Administrador">Administrador</option>
                   <option value="Cliente">Cliente</option>
           </select>
        </div>

        <!-- Botón submit que llevará al action (php) -->
        <button type="submit" class="btn btn-success">Crear usuario</button>
        <!-- Hipervínculo con clase botón que llevará a inicio 'crear_usuarios.html' -->
        <a href="menú.php" class="btn btn-dark">Volver al menú</a>
        </form>
    </div>    
    <div class="col-sm-3"></div>
  </div>
</div>
<!---->
</body>
</html>