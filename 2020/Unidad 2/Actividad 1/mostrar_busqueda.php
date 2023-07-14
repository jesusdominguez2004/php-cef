<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<!-- -->
        <?php
            include 'conexión_prueba.php';
            include 'clase_buscarUsuario.php';
            if (isset($_REQUEST['cod_usuario'])) {
                $cod_usuario = $_REQUEST['cod_usuario'];
                $ver_mov = new clase_buscarUsuario();
                $ver_mov -> setCodigo_u($cod_usuario);
                $dato = new clase_buscarUsuario();
                $consulta = $dato -> buscar_usuario($ver_mov);
                $json_ver_usuario = json_decode($consulta);
                if (count($json_ver_usuario)>0) {
                    $Codigo_u = $json_ver_usuario[0]->Codigo_u;
                    $nombre = $json_ver_usuario[0]->nombre_u;
                    $apellidos = $json_ver_usuario[0]->apellido_u;
                    $correo = $json_ver_usuario[0]->correo;  
                    //Los "}" terminan al final (Línea 79-88)                  
        ?>
<!-- Max 12 de tamaño por fila-->
<div class="container">
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        
        <!-- Formulario -->               
        <form method="POST" name="formResultado" action="actualizar.php">
        <div class="form-group"> <br><br><br><br>
        <center><strong>Busqueda de Usuarios PHP</strong></center>
        </div>

        <!-- Primer input "Código usuario" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Código</label>
          <input type="text" required readonly name="Codigo_u" value="<?php echo $Codigo_u; ?>" class="form-control">
        </div>

        <!-- Segundo input "Nombre usuario" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Nombre</label>
          <input type="text" required name="nombre" value="<?php echo $nombre; ?>" class="form-control">
        </div>

        <!-- Tercer input "Apellidos usuario" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Apellidos</label>
          <input type="text" required name="apellidos" value="<?php echo $apellidos; ?>" class="form-control">
        </div>

        <!-- Cuarto input "Correo usuario" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Correo</label>
          <input type="text" required name="correo" value="<?php echo $correo; ?>" class="form-control">
        </div>

        <!-- Botón buscar "submit" ir a "action" -->
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
<!---->
        <?php
            }else{
                echo "<center><div class='alert alert-danger'>No existe en el sistema</div></center>";
                $Codigo_u = "";
                $nombre = "";
                $apellidos = "";
                $correo = "";
            }
        }
        ?>
</body>
</html>