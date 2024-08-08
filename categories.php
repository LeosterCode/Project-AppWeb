
<?php
require 'db_conexion.php';
require 'navbar.php';
if (isset($_GET['slug'])) {
    $slug_category = $_GET['slug'];

    $select = $cnnPDO->prepare('SELECT * FROM product WHERE slug_category = :slug_category');
    $select->bindParam(':slug_category',$slug_category);
    $select->execute(); 
    $column = $select->fetch(PDO::FETCH_ASSOC); 
} else {
    echo '<p>No se encontrola categoria</p>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>My Productos</title>
</head>

<body class="body-productos">
    <div class="container-products">
        <h1>Mis Productos</h1>
    <?php
    $select = $cnnPDO->prepare('SELECT * FROM product WHERE slug_category = :slug_category');
    $select->bindParam(':slug_category',$slug_category);
    $select->execute();
    $count = $select->rowCount();
    $column = $select->fetchAll(PDO::FETCH_ASSOC);

    if ($count) {
        try {
            echo '<div class="card-mis-productos container mt-5">';
            echo '   <div class="row">';
            foreach ($column as $data) {
                echo '       <div>';
                echo '           <div class="carda" style="width: 100%; border:solid 1px black;">';
                echo '               <img src="data:image_png;base64,' . base64_encode($data['image_1']) . '" class="card-img-top" alt="...">';
                echo '               <div class="card-body-products ">';
                echo '                   <p class="id-producto">id producto:  ' . htmlentities($data["id_product"]) . '</p >';
                echo '                   <p>Matricula:  ' . htmlentities($data["student_id"]) . '</p >';
                echo '                   <p>Nombre:  ' . htmlentities($data["name_product"]) . '</p >';
                echo '                   <p>Descripcion:  ' . htmlentities($data["description"]) . '</p >';
                echo '                   <p>Precio:  ' . htmlentities($data["price"]) . '</p >';
                echo '                   <p>Stock:  ' . htmlentities($data["stock"]) . '</p >';
                echo '                   <p>Categoria:  ' . htmlentities($data["name_category"]) . '</p >';
                
                echo '               </div>';
                echo'';
                echo '<button type="button" class="boton-productos">Ver Producto</button>';
                echo '<button type="button" class="boton-productoss">Eliminar </button>';
                echo '           </div>';
                echo '       </div>';
            }
            echo '</div';
            echo '</div>';
        } catch (PDOException $error) {
            echo 'ERROR EN LA BASE DE DATOS' . $error->getMessage();
        }
    } else {
        echo "No tienes productos registrados";
    }
    ?>
    </div>


</body>
</html>