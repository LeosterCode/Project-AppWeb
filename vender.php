<?php
require 'db_conexion.php';
session_start();
require 'navbar.php';

if (isset($_POST['reg_prod'])) {
    $id_product = rand(1, 99);
    $student_id = $_SESSION['student_id'];
    $name_product = $_POST['name_product'];
    $description = $_POST['description'];
    $price = 99;
    $stock = $_POST['stock'];
    $id_category = $_POST['id_category'];
    $id_images = $id_product;
    $load_image = $_FILES['image_1']['tmp_name'];
    $image_1 = fopen($load_image, 'rb');

    if (!empty($image_1) && !empty($name_product) && !empty($description) && !empty($stock) && !empty($id_category)) {

        $insert = $cnnPDO->prepare('INSERT INTO product(id_product, student_id, name_product, description, price, stock, id_category, image_1) 
        VALUES (:id_product, :student_id, :name_product, :description, :price, :stock, :id_category, :image_1)');

        $insert->bindParam(':id_product', $id_product);
        $insert->bindParam(':student_id', $student_id);
        $insert->bindParam(':name_product', $name_product);
        $insert->bindParam(':description', $description);
        $insert->bindParam(':price', $price);
        $insert->bindParam(':stock', $stock);
        $insert->bindParam(':id_category', $id_category);
        $insert->bindParam(':image_1', $image_1, PDO::PARAM_LOB);

        $insert->execute();
        unset($insert);
        unset($cnnPDO);

        header('location:main_window.php');
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="body-vender">
   
    <div class="container-vender">
        <h1> VENDER</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Imagen</label>
                <input class="custom-file-input"  id="upload"  type="file" id="fileInput" accept="image/jpg" name="image_1">
            </div>
            <div class="mb-3">
                <label>Titulo</label>
                <input class="input-vender" name="name_product" type="text">
            </div>
            <div class="mb-3">
                <label>Descripcion</label>
                <textarea class="input-vender"  name="description" ></textarea>
            </div>
            <div class="mb-3">
                <label>Stock</label>
                <input class="input-vender"  name="stock" type="number">
            </div>
            <div class="mb-3">
                <label>Precio</label>
                <input class="input-vender"  name="price" type="number">
            </div>
            <select class="input-vender"  name="id_category" >
                <option selected>Categoria</option>
                <?php
                $select = $cnnPDO->prepare('SELECT * FROM category');
                $select->execute();
                $count = $select->rowCount();
                $colum = $select->fetchAll();
                foreach ($colum as $data) {
                    echo '<option value="' . htmlentities($data['id_category']) . '">' . htmlentities($data['name_category']) . '</option>';
                }
                ?>
            </select>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button name="reg_prod" class="btn btn-success" type="submit">Publicar</button>
                <a class="btn btn-success" type="button" href="main_window.php">Regresar</a>
            </div>
        </form>
    </div>
</body>

</html>