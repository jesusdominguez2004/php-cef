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
    <title>Crear producto | Almacen</title>
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
<body><br>
<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8"><center><h3> Crear Producto - Almacén <img src="img/caja.jpg" width="50"></h3></center></div>
    <div class="col-sm-2"></div>
  </div>

  <form method="POST" action="guardar_productos.php" enctype="multipart/form-data">

  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <!-- Doceabo input "Código parner" Tipo "text" -->
        <div class="form-group" align="right"> 
          <label for="ejemplo_text_1">Código parner
          <input type="text" placeholder="Ingrese código parner" name="cod_parner"></label>
        </div>
    </div>
  </div>

<!-- Max 12 de tamaño por fila-->
  <div class="row"> <!-- row = fila -->
    <div class="col-sm-4">

        <!-- Primero input "Nombre" Tipo "Text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Nombre del producto</label>
          <input type="text" required="" placeholder="Ingrese nombre del producto" name="nombre" class="form-control">
        </div>

        <!-- Segundo select "Grupo del producto" -->
        <div class="form-group"> 
          <label for="sel1">Grupo del producto</label>
            <select class="form-control" required="" name="grupo_prod">
                   <option value="Herramientas">Herramientas</option>
                   <option value="Bolsas">Bolsas</option>
                   <option value="Desechables">Desechables</option>
                   <option value="Otro">Otro</option>
           </select>
        </div>
        
        <!-- Tercero select "Tipo producto" -->
        <div class="form-group">
          <label for="ejemplo_text_1">Tipo de producto</label>
         <select class="form-control" required="" name="tipo_prod">
                   <option value="Herramientas">Herramientas</option>
                   <option value="Bolsas">Bolsas</option>
                   <option value="Desechables">Desechables</option>
                   <option value="Otro">Otro</option>
           </select>
        </div>

         <!-- Cuarto input "Descripción" Tipo "text" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Descripción del producto</label>
          <input type="text" placeholder="Ingrese descripción del producto" name="descripcion" required="" class="form-control">
        </div>     
    </div>
    <div class="col-sm-4">
        <!-- Quinto input "Valor compra" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Valor compra</label>
          <input type="number" min="1" max="1000000" step="1" placeholder="Ingrese valor de compra" name="valor_compra" required="" class="form-control">
        </div>

        <!-- Sexto input "Valor venta" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Valor venta</label>
          <input type="number" min="1" max="1000000" step="1" placeholder="Ingrese valor de venta" name="valor_venta" required="" class="form-control">
        </div>

        <!-- Septimo input "Porcentaje comisión" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Porcentaje comisión</label>
          <input type="number" min="1" max="99" step="1" placeholder="Ingrese porcentaje de comisión" name="porcentaje_comis" required="" class="form-control">
        </div>

        <!-- Octavo input "Valor comisión" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Valor comisión</label>
          <input type="number" min="1" max="1000000" step="1" placeholder="Ingrese valor de comisión" name="valor_comi" required="" class="form-control">
        </div>
    </div>    

    <div class="col-sm-4">

        <!-- Décimo input "Fecha" Tipo "date" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Fecha</label>
          <input type="date" placeholder="Ingrese fecha" name="fecha" required="" class="form-control">
        </div>

        <!-- Undécimo input "Nombre archivo" Tipo "text" -->
        <div class="form-group">
          <label for="ejemplo_text_1">Nombre archivo</label>
          <input type="text" placeholder="Nombre archivo" name="nomarchivo" required="" class="form-control">
        </div>

        <!-- Undécimo input "ubicfoto" Tipo "text" -->
        <div class="form-group">
          <label for="ejemplo_text_1">Foto</label>
          <input type="file" placeholder="Ingrese foto producto" name="ubicfoto" required="" class="form-control">
        </div>

        <!-- Undécimo input "Pos" Tipo "number" -->
        <div class="form-group"> 
          <label for="ejemplo_text_1">Pos</label>
          <input type="number" class="form-control" placeholder="Ingrese pos" name="pos" required="">
        </div>

     </div>
  </div>
</div>

<div class="form-group">
        <center>
        <!-- Botón que llevará al action (guardar_productos.php) -->
        <button type="submit" class="btn btn-success">Crear producto</button>  
        <!-- Hipervínculo con clase botón que llevará a inicio 'menú.php' -->
        <a href="menú.php" class="btn btn-dark">Volver al menú</a>
        </center>
</div>
</form>
<!---->
</body>
</html>