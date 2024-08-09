<?php
require 'navbar.php';
require 'db_conexion.php';
// Definir las variables para la conexión al PDO


try {
    // Conectar a la base de datos con PDO
    $utf8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD, $utf8);
} catch (PDOException $e) {

}

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM product WHERE name_product LIKE :searchTerm";
$stmt = $pdo->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="container mt-5">';
if (count($result) > 0) {
    echo "<h2>Resultados de búsqueda:</h2>";
    echo '<div class="row">';
    foreach ($result as $row) {
        echo '<div class="col-md-4 mb-4">';
        echo '   <div class="card" style="width: 100%; border: solid 1px black;">';
        echo  '     <a href="product_detail.php?id_product=' . htmlentities($row["id_product"]) . '" style="text-decoration: none; color: inherit;">';
        echo '          <img src="data:image/png;base64,' . base64_encode($row['image_1']) . '" class="card-img-top" alt="Imagen del producto" style="height: 300px; object-fit: cover;">';
        echo '          <div class="card-body">';
        echo '              <p class="id-producto">ID producto: ' . htmlentities($row["id_product"]) . '</p>';
        echo '              <p>Matrícula: ' . htmlentities($row["student_id"]) . '</p>';
        echo '              <p>Nombre: ' . htmlentities($row["name_product"]) . '</p>';
        echo '              <p>Descripción: ' . htmlentities($row["description"]) . '</p>';
        echo '              <p>Precio: ' . htmlentities($row["price"]) . '</p>';
        echo '              <p>Stock: ' . htmlentities($row["stock"]) . '</p>';
        echo '              <p>Categoría: ' . htmlentities($row["name_category"]) . '</p>';
        echo '              <div class="mt-auto text-center">'; 
        echo '                  <a href="resultado_buscar.php?id_product=' . htmlentities($row["id_product"]) . '" class="btn btn-primary">Ver Producto</a>'; 
        echo '              </div>';
        echo '          </div>';
        echo '   </div>';
        echo '</div>';
    }
    echo '</div>'; 
    echo '</div>';
} else {
    echo "No se encontraron productos.";
}

?>
