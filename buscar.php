<?php
require 'navbar.php';
require 'db_conexion.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_webapp_project";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM product WHERE name_product LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

echo '<div class="container mt-5">';
if ($result->num_rows > 0) {
    echo "<h2>Resultados de búsqueda:</h2>";
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">';
        echo '   <div class="card h-100" style="border: solid 1px black;">';
        echo '          <img src="data:image/png;base64,' . base64_encode($row['image_1']) . '" class="card-img-top" alt="Imagen del producto" style="height: 300px; object-fit: cover;">';
        echo '          <div class="card-body d-flex flex-column" style="display: flex; flex-direction: column; min-height: 250px;">';
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

$stmt->close();
$conn->close();
?>
