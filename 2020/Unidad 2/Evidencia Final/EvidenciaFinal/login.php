<?php session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión | Almacén</title>
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
    <div class="col-sm-6"> <br><br>

    <!-- Formulario centrado -->
    <center><h3> Base de datos Almacén<img src="img/SQL.png" width="90"><img src="img/buscar.png" width="50"></h3></center>
        <!-- action permite llevar variables, names, etc -->
        <form method="POST" action="login.php">

        <!-- Primer input "Nombre" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Nombre (Login)</label>
          <input type="text" placeholder="Ingrese nombre" name="nombre_usuario" class="form-control">
        </div>

        <!-- Segundo input "Contraseña" Tipo "Password" -->
        <div class="form-group"> 
          <label for="pwd">Contraseña</label>
          <input type="password" placeholder="Ingrese contraseña" name="contraseña_usuario" class="form-control">
        </div>

        <!-- Botón submit que llevará al action (php) -->
        <button type="submit" class="btn btn-success">Iniciar sesión</button>
        <!-- Hipervínculo con clase botón que llevará a inicio 'crear_usuarios.php' -->
        <a href="crear_usuarios.php" class="btn btn-dark">Crear usuario</a>
        <p align="right">-Jesús Domínguez</p>
        </form>

    </div>    
    <div class="col-sm-3"></div>
  </div>
</div>
<!---->
<?php
// Con la guía para hacer sesiones, descubrí que ya no es necesaro comparar y validar el logeo manualmente, ahora solo hay que agregar esto y lo que está al principio
    include 'conexion_almacen.php';
    include 'clase_ingreso.php';

    // Preparar consulta para validar
    // isset es para hacer x, cuando una variable ya tenga información o se use
    if(isset($_REQUEST['nombre_usuario'])) {

        $login_usuario = $_REQUEST['nombre_usuario'];
        $contraseña = $_REQUEST['contraseña_usuario'];

        $nuevoLogin = new clase_ingreso();
        $nuevoLogin -> setLogin($login_usuario);
        $nuevoLogin -> setPassword($contraseña);

        $proceso = new clase_ingreso();
        $consulta = $proceso -> validar_usuario($nuevoLogin);
        $json_usuario = json_decode($consulta);

        if (count($json_usuario) == 1) {
            // Crear una sesión, variables compartidas en todas las hojas (Seguridad y sencillez)
            // Nadie podrá acceder a ninguna hoja de código usando la URL, solo si ya ha iniciado sesión
            $_SESSION["idUser"] = $json_usuario[0]->id_usuario;
            $_SESSION["loginUser"] = $login_usuario;
            $_SESSION["nombreUser"] = $json_usuario[0]->nombre_usuario;
            $_SESSION['apellidoUser'] = $json_usuario[0]->apellido_usuario;
            $_SESSION['perfilUser'] = $json_usuario[0]->id_perfil;
            // Dirijir a
            header("Location:menú.php"); 
        } else {
                echo "<script language='javascript'>alert('No existe en el sistema');</script>";

                echo "<center><div class='alert alert-danger'>No existe en el sistema</div></center>";
            }
        }
?>
<?php
ob_end_flush();
?>
</body>
</html>