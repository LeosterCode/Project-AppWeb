<?php
require 'db_conexion.php';
require 'navbar.php';

if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product'];

    $select = $cnnPDO->prepare('SELECT * FROM product WHERE id_product = :id_product');
    $select->bindParam(':id_product', $id_product);
    $select->execute(); 
    $column = $select->fetch(PDO::FETCH_ASSOC); 
} else {
    echo '<p>No se encontró el producto</p>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
</head>

<body>

    <?php
    echo '<div class="card-mis-productos container mt-5">';
    echo '   <div class="row">';
    echo '       <div>';
    echo '           <div class="carda" style="width: 100%; border: solid 1px black;">';
    echo '               <img src="data:image/png;base64,' . base64_encode($column['image_1']) . '" class="card-img-top" alt="Imagen del producto">';
    echo '               <div class="card-body-products">';
    echo '                   <p class="id-producto">ID producto: ' . htmlentities($column["id_product"]) . '</p>';
    echo '                   <p>Matrícula: ' . htmlentities($column["student_id"]) . '</p>';
    echo '                   <p>Nombre: ' . htmlentities($column["name_product"]) . '</p>';
    echo '                   <p>Descripción: ' . htmlentities($column["description"]) . '</p>';
    echo '                   <p>Precio: ' . htmlentities($column["price"]) . '</p>';
    echo '                   <p>Stock: ' . htmlentities($column["stock"]) . '</p>';
    echo '                   <p>Categoría: ' . htmlentities($column["name_category"]) . '</p>';
    echo '               </div>';
    echo '               <button type="button" class="boton-productos">Ver Producto</button>';
    echo '               <button type="button" class="boton-productoss">Eliminar</button>';
    echo '           </div>';
    echo '       </div>';
    echo '   </div>';
    echo '</div>';
    ?>
    
</body>

</html>
