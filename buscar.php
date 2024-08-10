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
</head>
<body class="body-buscar">

    <div class="container-cards-buscar">
<?php
$query = isset($_GET['query']) ? $_GET['query'] : '';
$searchTerm = "%" . $query . "%";
$search = $cnnPDO->prepare("SELECT * FROM product WHERE name_product LIKE :searchTerm");
$search->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
$search->execute();
$count = $search->rowCount();
$result = $search->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="container">';
if ($count) {
    echo "<h2>Resultados de búsqueda:</h2>";
    echo '<div class="container-cardss">';
    foreach ($result as $row) {
        echo '<div>';
        echo '   <div class="cardss" style="width: 100%; border: solid 1px black;">';
        echo  '     <a href="window_product.php?slug=' . htmlentities($row["slug_product"]) . '" style="text-decoration: none; color: inherit;">';
        echo '          <img src="data:image/png;base64,' . base64_encode($row['image_1']) . '" class="card-img-top" alt="Imagen del producto" style="height: 300px; object-fit: cover;">';
        echo '          <div class="card-body">';
        echo '              <p class="id-producto">ID producto: ' . htmlentities($row["id_product"]) . '</p>';
        echo '              <p>Matrícula: ' . htmlentities($row["student_id"]) . '</p>';
        echo '              <p>Nombre: ' . htmlentities($row["name_product"]) . '</p>';
        echo '              <p>Descripción: ' . htmlentities($row["description"]) . '</p>';
        echo '              <p>Precio: ' . htmlentities($row["price"]) . '</p>';
        echo '              <p>Stock: ' . htmlentities($row["stock"]) . '</p>';
        echo '              <p>Categoría: ' . htmlentities($row["name_category"]) . '</p>';
        echo '          </div>';
        echo '   </div>';
        echo '</div>';
    }
    echo '</div>'; 
    echo '</div>';
    echo $_GET['search']->queryString;
} else {
    echo "No se encontraron productos.";
}

?>

    </div>


</body>
</html>
