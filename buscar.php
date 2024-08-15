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
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-buscar">

<div class="container-cards-buscar">
<div class="container-cardss">
<?php
$query = isset($_GET['query']) ? $_GET['query'] : '';
$searchTerm = "%" . $query . "%";
$search = $cnnPDO->prepare("SELECT * FROM product WHERE name_product LIKE :searchTerm");
$search->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
$search->execute();
$count = $search->rowCount();
$result = $search->fetchAll(PDO::FETCH_ASSOC);


if ($count) {
    
    
    foreach ($result as $row) {
        echo '<div>';
        echo '   <div class="cardss"  style="width: 300px;" height: 100%;>';
        echo  '     <a class="col-3" href="window_product.php?slug=' . htmlentities($row["slug_product"]) . '" style="text-decoration: none; color: inherit;">';
        echo '          <img src="data:image/png;base64,' . base64_encode($row['image_1']) . '" class="card-img-top"  none; alt="Imagen del producto" object-fit: cover;">';
        echo '          <div class="card-body">';
        echo '              <p>Nombre: ' . htmlentities($row["name_product"]) . '</p>';
        echo '              <p>Precio: ' . htmlentities($row["price"]) . '</p>';
        echo '              <p>Stock: ' . htmlentities($row["stock"]) . '</p>';
        echo '          </div>';
        
        echo '   </div>';
        echo '</div>';
    }


} else {
    echo "No se encontraron productos.";
}

?>

</div>
</div>

</body>
</html>
