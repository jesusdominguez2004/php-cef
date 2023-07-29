<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad 2 | Actividad 3 | PHP</title>
    <!-- CSS: Bootstrap 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Icons: Font Awesome 6.4.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Contenido página -->
    <?php 
        include "conexion.php";
        include "clase_ingreso.php";

        if (isset($_REQUEST["id_cliente"])) {
            $id_cliente = $_REQUEST["id_cliente"];
            $cliente_buscar = new ClaseIngreso();
            $cliente_buscar -> set_id_cliente($id_cliente);
            $dato = new ClaseIngreso();
            $consulta = $dato -> buscar_cliente($cliente_buscar);
            $array_clientes = json_decode($consulta);
            if (count($array_clientes) > 0) {
                $id_cliente = $array_clientes[0] -> id_cliente;
                $tipo_doc = $array_clientes[0] -> tipo_doc;
                $num_doc = $array_clientes[0] -> num_doc;
                $nombres = $array_clientes[0] -> nombres;
                $apellidos = $array_clientes[0] -> apellidos;
                $dir_casa = $array_clientes[0] -> dir_casa;
                $correo = $array_clientes[0] -> correo;
                $telefono = $array_clientes[0] -> telefono;
                $fecha_nac = $array_clientes[0] -> fecha_nac;
    ?>

    <div class="container mt-3">    
        <h2>Unidad 2 | Actividad 3 | Prueba clientes <i class="fa-brands fa-php fa-xl"></i></h2>
        <form role="form" action="actualizar_cliente.php" method="post" name="formulario">
            <div class="row">
                <div class="mb-3 mt-3">
                    <label for="id_cliente">ID Cliente:</label>
                    <input type="number" class="form-control" readonly value="<?php echo $id_cliente; ?>"  id="id_cliente" name="id_cliente">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3 mt-3">
                        <label for="nombres">Nombres cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $nombres; ?>" id="nombres" name="nombres">
                    </div>
        
                    <div class="mb-3 mt-3">
                        <label for="apellidos">Apellidos cliente:</label>
                        <input type="text" class="form-control" value="<?php echo $apellidos; ?>"  id="apellidos" name="apellidos">
                    </div>
        
                    <div class="mb-3 mt-3">
                        <label for="horas">Tipo documento:</label>
                        <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                            <option value="0" <?php if ($tipo_doc == 0) echo "selected"; ?>>Cédula</option>
                            <option value="1" <?php if ($tipo_doc == 1) echo "selected"; ?>>Tarjeta de identidad</option>
                            <option value="2" <?php if ($tipo_doc == 2) echo "selected"; ?>>Otro</option>
                        </select>
                    </div>
        
                    <div class="mb-3 mt-3">
                        <label for="numDocumento">Número documento:</label>
                        <input type="number" class="form-control" value="<?php echo $num_doc; ?>"  id="numDocumento" name="numDocumento">
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3 mt-3">
                        <label for="direccion">Dirección casa:</label>
                        <input type="text" class="form-control" value="<?php echo $dir_casa; ?>"  id="direccion" name="direccion">
                    </div>
        
                    <div class="mb-3 mt-3">
                        <label for="correo">Correo:</label>
                        <input type="text" class="form-control" value="<?php echo $correo; ?>"  id="correo" name="correo">
                    </div>
        
                    <div class="mb-3 mt-3">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" value="<?php echo $telefono; ?>"  id="telefono" name="telefono">
                    </div>
        
                    <div class="mb-3 mt-3">
                        <label for="fechaNacimiento">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" value="<?php echo $fecha_nac; ?>"  id="fechaNacimiento" name="fechaNacimiento">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-warning">Actualizar cliente</button>
            <a href="buscar_cliente.php" class="btn btn-success">Volver a buscar_cliente.php</a>
            <a href="index.html" class="btn btn-primary">Volver a index.html</a>
        </form>

        <br>
        <div class="alert alert-warning">
            <strong>Nota:</strong> Tabla "prueba_tb_clientes"
        </div>
    </div>

    <?php 
            } else {
                echo "<div class='container mt-3'>";
                echo "<h2>Unidad 2 | Actividad 3 | Prueba clientes <i class='fa-brands fa-php fa-xl'></i></h2>";
                echo "<div class='alert alert-danger'>";
                echo "<strong>Sistema:</strong> Cliente no existe... (id_cliente = $id_cliente)";
                echo "</div>";
                echo "<a href='buscar_cliente.php' class='btn btn-success'>Volver a buscar_cliente.php</a>";
                echo "</div>";
                $id_cliente = "";
                $tipo_doc = "";
                $num_doc = "";
                $nombres = "";
                $apellidos = "";
                $dir_casa = "";
                $correo = "";
                $telefono = "";
                $fecha_nac = ""; 
            }
        }
    ?>

    <!-- JavaScript: jQuery, Bootstrap, pooperjs -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>