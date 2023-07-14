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
    <title>Resultado búsqueda productos | Almacen </title>
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
            # Validar Código producto vacío
            $codigo_prod = $_REQUEST['codigo_prod'];
            if ($codigo_prod == "") {
                  echo "<center><div class='alert alert-danger'>No ha ingresado el Código Producto a buscar</div></center>";
                }else{
            #Validar que el Código producto exista
            if (isset($_REQUEST['codigo_prod'])) {
                # Guardar Código producto en SetCodigo_prod
                # $codigo_prod = $_REQUEST['codigo_prod'];
                $ver_mov = new clase_ingreso(); #Como una varibale de ella
                $ver_mov -> SetCodigo_prod($codigo_prod);
                # Guargar SetCodigo_prod como parametro de function buscar_productos()
                $dato = new clase_ingreso();
                $consulta = $dato -> Consulta_buscar_producto($ver_mov);
                # Decodifica para guardar en las siguientes variables PHP
                $json_ver_producto = json_decode($consulta);
                if (count($json_ver_producto)>0) {
                    $nombre = $json_ver_producto[0]->nombre;
                    $grupo_prod = $json_ver_producto[0]->grupo_prod;
                    $tipo_prod = $json_ver_producto[0]->tipo_prod;
                    $descripcion = $json_ver_producto[0]->descripcion;
                    $valor_compra = $json_ver_producto[0]->valor_compra;
                    $valor_venta = $json_ver_producto[0]->valor_venta;
                    $porcentaje_comis = $json_ver_producto[0]->porcentaje_comis;
                    $valor_comi = $json_ver_producto[0]->valor_comi;
                    $fecha = $json_ver_producto[0]->fecha;
                    $nomarchivo = $json_ver_producto[0]->nomarchivo;
                    $ubicfoto = $json_ver_producto[0]->ubicfoto;
                    $cod_parner = $json_ver_producto[0]->cod_parner;
                    $pos = $json_ver_producto[0]->pos;
                    
                #Solucionar error de los Select
                    $gp1 = "";
                    $gp2 = "";
                    $gp3 = "";
                    $gp4 = "";
                    
                    $tp1 ="";
                    $tp2 ="";
                    $tp3 ="";
                    $tp4 ="";    
                # Validar Control grupo_prod
                if ($grupo_prod == "Herramientas") {
                   $gp1 = "selected=''";
                }
                if ($grupo_prod == "Bolsas") {
                   $gp2 = "selected=''";
                }
                if ($grupo_prod == "Desechables") {
                   $gp3 = "selected=''";
                }
                if ($grupo_prod == "Otro") {
                   $gp4 = "selected=''";
                }
                # Validar Control tipo_prod
                if ($tipo_prod == "Herramientas") {
                   $tp1 = "selected=''";
                }
                if ($tipo_prod == "Bolsas") {
                   $tp2 = "selected=''";
                }
                if ($tipo_prod == "Desechables") {
                   $tp3 = "selected=''";
                }
                if ($tipo_prod == "Otro") {
                   $tp4 = "selected=''";
                }
                # Los "}" terminan al final (Línea)                  
        ?>
<div class="container"><br>
        <!-- Formulario -->    
        <center><h3> Resultados  <img src="img/buscar.png" width="50"></h3></center>
</div>
<form method="POST" name="formProductos1" action="mensaje_confirmacion_productos.php">
<div class="container">
<div class="row">
      <div class="col-sm-4">
      <!-- Input "Código Producto" Tipo "number" -->
      <?php
        echo "<a><strong>Código Producto: </strong></a><input readonly name='codigo_prod' value='$codigo_prod'>";
      
        echo "</div>";
        echo "<div class='col-sm-3'>";
        echo "<a><strong>Código parner: </strong></a><input readonly name='cod_parner' value='$cod_parner'>";
        echo "</div>";
      ?>
      <div class="col-sm-4"></div>
</div><br>
<!-- Max 12 de tamaño por fila-->
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-4">

        <!-- Primero input "Nombre" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Nombre del producto</label>
          <input type="text" placeholder="Ingrese nombre del producto" name="nombre" readonly value="<?php echo $nombre ?>" class="form-control">
        </div>

        <!-- Segundo select "Grupo del producto" -->
        <div class="form-group"> 
          <label for="sel1">Grupo del producto</label>
            <select class="form-control" name="grupo_prod" readonly>
                   <option value="Herramientas" <?php echo $gp1?>>Herramientas</option>
                   <option value="Bolsas" <?php echo $gp2?>>Bolsas</option>
                   <option value="Desechables" <?php echo $gp3?>>Desechables</option>
                   <option value="Otro" <?php echo $gp4?>>Otro</option>
           </select>
        </div>
        
        <!-- Tercero select "Tipo producto" -->
        <div class="form-group">
          <label for="ejemplo_text_1">Tipo de producto</label>
         <select class="form-control" name="tipo_prod" readonly>
                   <option value="Herramientas" <?php echo $tp1?>>Herramientas</option>
                   <option value="Bolsas" <?php echo $tp2?>>Bolsas</option>
                   <option value="Desechables" <?php echo $tp3?>>Desechables</option>
                   <option value="Otro" <?php echo $tp4?>>Otro</option>
           </select>
        </div>

         <!-- Cuarto input "Descripción" Tipo "text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Descripción del producto</label>
          <input type="text" placeholder="Ingrese descripción del producto" name="descripcion" readonly value="<?php echo $descripcion ?>" class="form-control">
        </div>     
    </div>
    <div class="col-sm-4"> 
        <!-- Quinto input "Valor compra" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Valor compra</label>
          <input type="number" min="1" max="1000000" step="1" placeholder="Ingrese valor de compra" name="valor_compra" readonly value="<?php echo $valor_compra ?>" class="form-control">
        </div>

        <!-- Sexto input "Valor venta" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Valor venta</label>
          <input type="number" min="1" max="1000000" step="1" placeholder="Ingrese valor de venta" name="valor_venta" readonly value="<?php echo $valor_venta ?>" class="form-control">
        </div>

        <!-- Septimo input "Porcentaje comisión" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Porcentaje comisión</label>
          <input type="number" min="1" max="99" step="1" placeholder="Ingrese porcentaje de comisión" name="porcentaje_comis" readonly value="<?php echo $porcentaje_comis ?>" class="form-control">
        </div>

        <!-- Octavo input "Valor comisión" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Valor comisión</label>
          <input type="number" min="1" max="1000000" step="1" placeholder="Ingrese valor de comisión" name="valor_comi" readonly value="<?php echo $valor_comi ?>" class="form-control">
        </div>
    </div>    

    <div class="col-sm-4">

        <!-- Décimo input "Fecha" Tipo "date" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Fecha</label>
          <input type="date" placeholder="Ingrese fecha" name="fecha" readonly value="<?php echo $fecha ?>" class="form-control">
        </div>

        <!-- Undécimo input "Nombre archivo" Tipo "text" -->
        <div class="form-group">
          <label for="ejemplo_text_1">Nombre archivo</label>
          <input type="text" placeholder="Nombre archivo" name="nomarchivo" readonly value="<?php echo $nomarchivo ?>" class="form-control">
        </div>

        <!-- Undécimo input "ubicfoto" Tipo "text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Foto</label>
          <img width="50" src="fotos_productos/<?php echo $ubicfoto ?>">
        </div>

        <!-- Undécimo input "Pos" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Pos</label>
          <input type="number" placeholder="Ingrese pos" name="pos" readonly value="<?php echo $pos ?>" class="form-control">
        </div>
     </div>
  </div>
</div>
 <div class="form-group">
        <center>
        <!-- Botón que llevará al action (editar_productos.php) -->
        <button type="submit" class="btn btn-success">Eliminar</button>  
        <!-- Hipervínculo con clase botón que llevará a 'buscar_productos.php' -->
        <a href="buscar_eliminar_productos.php" class="btn btn-dark">Volver</a>
        </center>
        </div>
</form>

<!---->
        <?php
            }else{
                echo "<center><div class='alert alert-danger'>No existe en el sistema</div></center>";
                # Vaciar variables PHP
                $nombre = "";
                $grupo_prod = "";
                $tipo_prod = "";
                $descripcion = "";
                $valor_compra = "";
                $valor_venta = "";
                $porcentaje_comis = "";
                $valor_comi = "";
                $fecha = "";
                $ubicfoto = "";
                $cod_parner = "";
                $pos = "";
            }
        }
        }
        ?>
</body>
</html>                                                                        