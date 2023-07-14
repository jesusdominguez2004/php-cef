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
    <title>Menú | Almacen</title>
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

    <!-- Estilos menú -->
    <style type="text/css">
        #barraMenú {
            background: #f2f2f2;
            border-radius: 5px;
            color:  #262626;
        }

        #separadorColumnas {
            border-right: 2px solid #f2f2f2;
        }

        #separadorFilas {
            border-top: 2px solid #f2f2f2;
        }

        #piePágina {
            background: #262626;
            width: "100%";
        }

        #textoPiePágina {
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
        <?php
        // Incluir las dos otras hojas PHP (El módulo de clase, y la hoja de consultas)
            include 'conexion_almacen.php';
            include 'clase_ingreso.php';      
            // Ha sido remplazado por el código del profesor (sesiones y validaciones), es más seguro y sencillo

            // - - - - - - -

            // Capturar información del formulario
            // $nombre_usuario = $_REQUEST['nombre_usuario'];
            // $password = $_REQUEST['contraseña_usuario'];
            
            // Validar campos vacios
            // if ($nombre_usuario === "" or $password === "") {
                // if ($nombre_usuario === "" and $password === "") {
                    // echo "<center><div class='alert alert-danger'>No ha ingreado los datos del usuario</div></center>";
                // }
                // if ($nombre_usuario === "") {
                    // echo "<center><div class='alert alert-danger'>No ingresó el nombre</div></center>";
                // }
                // if ($password === "") {
                    // echo "<center><div class='alert alert-danger'>No ingresó la contraseña</div></center>";
                // }                
                
            // }else {
            // Buscar en la base de datos este usuario

            // Con la guía para hacer sesiones, descubrí que ya no es necesaro comparar y validar el logeo manualmente

            // Para la próxima solo escribo la nueva y mejor forma validar usuario, pero por ahora dejaré también la primera forma como lo hice, es la siguiente:
            // A) Buscar Login
            // if(isset($nombre_usuario)) {
                // $ver_mov = new clase_ingreso();
                // $ver_mov -> setLogin($nombre_usuario);

                // $dato = new clase_ingreso();
                // $consulta = $dato -> buscar_login($ver_mov);
                // $json_buscar_login = json_decode($consulta);
            // }
            // B) Buscar password ERROR
            // if(isset($password)) {
                // $ver_mov = new clase_ingreso();
                // $ver_mov -> setLogin($nombre_usuario);

                // $dato = new clase_ingreso();
                // $consulta = $dato -> buscar_password($ver_mov);
                // $json_buscar_password = json_decode($consulta);
            // }
            // C) Buscar ID Perfíl
            // if(isset($nombre_usuario)) {
                // $ver_mov = new clase_ingreso();
                // $ver_mov -> setLogin($nombre_usuario);

                // $dato = new clase_ingreso();
                // $consulta = $dato -> buscar_id_perfil($ver_mov);
                // $json_buscar_perfil = json_decode($consulta);
            // }

            // Si login no existe (Porque no existe usuario)    
            // if (count($json_buscar_login)<1) {
                    // echo "<center><div class='alert alert-danger'>No existe este usuario</div></center>";
                // }else{
            // $LoginEncontrado = $json_buscar_login[0]->login_usuario;

            // Si contraseña está equivocada    
            // if (count($json_buscar_password)<1) {
                   
                // }else{
            // $passwordEncontrado = $json_buscar_password[0]->password_usuario;
            // if ($passwordEncontrado <> $password) {
                    // echo "<center><div class='alert alert-danger'>Contraseña incorrecta</div></center>";
                // }else{
            // Traer su ID Perfíl        
            // $perfilEncontrado = $json_buscar_perfil[0]->id_perfil;

            // Traer su nombre completo
            // $ver_mov = new clase_ingreso(); #Como una varibale de ella
            // $ver_mov -> setLogin_usuario($nombre_usuario);
            // $dato = new clase_ingreso();
            // $consulta = $dato -> buscar_nombre_completo($ver_mov);

            // Decodifica para guardar en las siguientes variables PHP
            // $json_ver_usuario = json_decode($consulta);
            // if (count($json_ver_usuario)>0) {
                // $nombre_u = $json_ver_usuario[0]->nombre_usuario;
                // $apellido_usuario = $json_ver_usuario[0]->apellido_usuario;
                
            // Comparar con información formulario
            // if ($nombre_usuario == $LoginEncontrado and $password == $passwordEncontrado) {

            // - - - - - - -

            // Con PHP, podemos usar HTML dentro de él mismo, solamente hay que tener todo en echos
            // Encabezado (Título + img)
            echo "<br><div class='container'><center><h3> Menú - Almacen <img src='img/Seguridad mano.png' width='50'></h3></center></div>";
            // Datos del usuario
            echo "<div class='container'><div class='row' id='barraMenú'><div class='col-sm-6'>Bienvenido: <i>".$nombre_usuario." ".$apellido_usuario." (".$login_usuario.")</i><br>ID Perfíl: <i>".$id_perfil."</i></div>";
            // Cerrar sesión
            echo "<div class='col-sm-6' align='right'><a href='login.php'>Cerrar Sesión</a></div></div><br>";       
        ?>
<?php
// Menú Administrador
if ($id_perfil == "Administrador"){
echo "<!-- Max 12 de tamaño por fila-->
<div class='container'>
  <div class='row'> <!-- row = fila -->
    <!-- Productos -->
    <div class='col-sm-4' id='separadorColumnas'>
        <h4>Productos <img src='img/caja.jpg' height='35'></h4>
        <p>Tiene acceso a todas las funciones, podrá crear, ver, actualizar y borrar productos.</p><br>
        <a href='crear_productos.php' class='btn btn-light'>Crear productos</a><br><p></p>
        <a href='buscar_productos.php' class='btn btn-light'>Buscar productos</a><br><p></p>
        <a href='buscar_productos.php' class='btn btn-light'>Editar productos</a><br><p></p>
        <a href='buscar_productos_eliminar.php' class='btn btn-light'>Eliminar productos</a><br><p></p>
        <a href='mostrar_productos.php' class='btn btn-light'>Ver productos</a>
    </div>
    <!-- Usuarios -->
    <div class='col-sm-4' id='separadorColumnas'>
        <h4>Usuarios <img src='img/usuario 1.png' height='35'></h4>
        <p>Tiene acceso a todas las funciones, podrá crear, ver, actualizar y borrar usuarios.</p><br>
        <a href='crear_usuarios.php' class='btn btn-light'>Crear usuarios</a><br><p></p>
        <a href='buscar_usuarios.php' class='btn btn-light'>Buscar usuarios</a><br><p></p>
        <a href='buscar_usuarios.php' class='btn btn-light'>Editar usuarios</a><br><p></p>
        <a href='buscar_usuarios_eliminar.php' class='btn btn-light'>Eliminar usuarios</a><br><p></p>
        <a href='mostrar_usuarios.php' class='btn btn-light'>Ver usuarios</a>
    </div>
    <!-- Clientes-->
    <div class='col-sm-4'>
        <h4>Clientes <img src='img/cliente.jpg' height='35'></h4>
        <p>Tiene acceso a todas las funciones, podrá crear, ver, actualizar y borrar clientes.</p><br>
        <a href='crear_clientes.php' class='btn btn-light'>Crear clientes</a><br><p></p>
        <a href='buscar_clientes.php' class='btn btn-light'>Buscar clientes</a><br><p></p>
        <a href='buscar_clientes.php' class='btn btn-light'>Editar clientes</a><br><p></p>
        <a href='buscar_clientes_eliminar.php' class='btn btn-light'>Eliminar clientes</a><br><p></p>
        <a href='mostrar_clientes.php' class='btn btn-light'>Ver clientes</a>
    </div>

  </div><br>

  <div class='row'>
    <div class='col-sm-12' id='separadorFilas'><br>
    <p> Para ver todos los registros de las tres tablas: <a href='mostrar_todo.php' class='btn btn-light'>Ver todo</a></p>
    </div>
  </div> 

</div>";
}
// Menú Cliente
if ($id_perfil == "Cliente"){
echo "<!-- Max 12 de tamaño por fila-->
<div class='container'>
  <div class='row'> <!-- row = fila -->
    <!-- Productos -->
    <div class='col-sm-6' id='separadorColumnas'>
        <h4>Productos <img src='img/caja.jpg' height='35'></h4>
        <p>Solo tiene acceso a ver productos, no puede editar, borrar o crear productos.</p><br>
        <a href='ver_productos.php' class='btn btn-light'>Ver productos</a>
    </div>
    <!-- Clientes-->
    <div class='col-sm-6'>
        <h4>Clientes <img src='img/cliente.jpg' height='35'></h4>
        <p>Solo tiene acceso a ver clientes, no puede editar, borrar o crear cliente.</p><br>
        <a href='mostrar_clientes.php' class='btn btn-light'>Ver clientes</a>
    </div>

  </div><br>

</div>";
}
?>
        <?php
            // }else{
                // echo "<center><div class='alert alert-danger'>No existe este usuario</div></center>";
            // }
            // }
            // }
            // }
            // }
            // }
        ?>
<!-- Pie de página -->
<div id="piePágina">
    <div>
        <p id="textoPiePágina">@ Jesús Alberto Domínguez Charris</p>
    </div>
</div>
</body>
</html>