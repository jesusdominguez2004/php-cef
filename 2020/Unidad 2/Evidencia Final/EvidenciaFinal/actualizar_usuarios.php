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
    <title> Resultado editar usuario | Almacen </title>
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
            # Validar campos vacios
            if ($nombre_u === "" or $apellidos_u === "" or $tipo_doc === "" or $telefono_u === "" or $login_usuario === "" or $password_usuario === "" or $id_perfil === "") {
                # Mensaje de error
                echo "<center><div class='alert alert-danger'>No puede guardar hay campos vacíos</div></center>";
            }else {
            # Prepara la consulta SQL Update
            # Del las variables al clase_ingreso
            $dato_entrada = new clase_ingreso();
            $dato_entrada->setID_Usuario($id_usuario);
            $dato_entrada->setNombre_u($nombre_u);
            $dato_entrada->setApellidos_u($apellidos_u);
            $dato_entrada->setTipodoc($tipo_doc);
            $dato_entrada->setIdentificacion($identificacion);
            $dato_entrada->setTelefono_u($telefono_u);
            $dato_entrada->setLogin_usuario($login_usuario);
            $dato_entrada->setPassword_usuario($password_usuario);
            $dato_entrada->setID_Perfil($id_perfil);

            $proceso = new clase_ingreso();
            $consulta = $proceso->Consulta_editar_usuario($dato_entrada);
        ?>
<!---->
<div class="container"><br><br>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <?php 
        echo "Cambios guardados correctamente"."<br>";
            echo "<i>".$nombre_u." ".$apellidos_u."</i><br>";         
            echo "- Tipo de documento: ".$tipo_doc."<br>";
            echo "- Número de documento: ".$identificacion."<br>";
            echo "- Teléfono: ".$telefono_u."<br><br>";
            echo "Datos de usuario:"."<br>";
            echo "- ID Usuario: ".$id_usuario."<br>";  
            echo "- Login: ".$login_usuario."<br>";
            echo "- Contraseña: ".$password_usuario."<br>";
            echo "- ID Perfíl: ".$id_perfil."<br><br>";

            echo "<center><img src='img/reciclar.jpg' width='50'><img src='img/Herramienta y seguridad.png' width='50'></center>";
        }
      ?>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>

</body>
</html>                                                                        