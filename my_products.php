<?php
require 'db_conexion.php';
session_start();
require 'navbar.php';
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
    $select = $cnnPDO->prepare('SELECT * FROM product WHERE student_id = ?');
    $select->execute([$_SESSION['student_id']]);
    $count = $select->rowCount();
    $column = $select->fetchAll(PDO::FETCH_ASSOC);

    if ($count) {
        try {
            echo '<div class="card-mis-productos container mt-5">';
            echo '   <div class="row">';
            foreach ($column as $data) {
                echo '       <div>';
                echo '           <div class="carda" style="width: 100%; border:solid 1px while;">';
                echo '               <img src="data:image_png;base64,' . base64_encode($data['image_1']) . '" class="card-img-top" alt="...">';
                echo '               <div class="card-body-products ">';
<<<<<<< HEAD
                echo '<div class="element-1">';
                echo '                   <p>id producto:  ' . htmlentities($data["id_product"]) . '</p >';
                echo '</div>';
                echo '<div class="element-2">';
=======
                echo '                   <p class="id-producto">id producto:  ' . htmlentities($data["id_product"]) . '</p >';
>>>>>>> 54bcd0a29e3a77400f8a387246d3fca39feae944
                echo '                   <p>Nombre:  ' . htmlentities($data["name_product"]) . '</p >';
                echo '                   <p>Descripcion:  ' . htmlentities($data["description"]) . '</p >';
                echo '</div>';
                echo '<div class="element-4">';
                echo '                   <p>Categoria:  ' . htmlentities($data["name_category"]) . '</p >';
                echo '                   <p>Precio:  ' . htmlentities($data["price"]) . '</p >';
                echo '                   <p>Stock:  ' . htmlentities($data["stock"]) . '</p >';
                echo '</div>';
                echo '<div class="element-5">';
                echo '<button type="button" class="boton-productos">Ver Producto</button>';
                echo '<button type="button" class="boton-productos-editar">Editar </button>';
                echo '<button type="button" class="boton-productos-eliminar">Eliminar </button>';
                echo '</div>';
                echo '               </div>';
                echo'';

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