
<?php
require 'db_conexion.php';
session_start();
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

<body class="body-categorias">
<h1>Categoria</h1>
    <div class="container-cards">
        
    <?php
    $select = $cnnPDO->prepare('SELECT * FROM product WHERE slug_category = :slug_category');
    $select->bindParam(':slug_category',$slug_category);
    $select->execute();
    $count = $select->rowCount();
    $column = $select->fetchAll(PDO::FETCH_ASSOC);

    if ($count) {
        try {
            
            echo '   <div class="cards">';
            foreach ($column as $data) {
                echo '  <div class="card border-dark mx-3 mb-3" style="max-width: 18rem;">';
                echo '    <img src="data:image_png;base64,' . base64_encode($data['image_1']) . '" class="card-img-top" alt="...">';
                echo '    <div class="card-body">';
                echo '      <h5 class="card-name">' . htmlentities($data['name_product']) . '</h5>';
    
                echo '      <p class="card-text">$ '.htmlentities($data['price']).'.00 MXN</p>';
                echo '              <p>Stock: ' . htmlentities($data["stock"]) . '</p>';
                echo '    </div>';
                echo '      <a href="window_product.php?slug=' . htmlentities($data['slug_product']) . ' " >Ver producto</a>';
                echo '  </div>';
                
            }
            echo '</div';
            
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