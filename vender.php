<?php
require 'db_conexion.php';
session_start();
if(isset($_POST['reg_prod'])){
    $id_product = rand(1,99);
    $student_id = $_SESSION['student_id'];
    $name_product = $_POST['name_product'];
    $description = $_POST['description'];
    $price = 99;
    $stock = $_POST['stock'];
    $id_category = $_POST['id_category'];

    $id_images = $id_product;
    $load_image = $_FILES['image1']['tmp_name'];
    $image_1 = fopen($load_image,'rb');

    if(!empty($image_1) && !empty($name_product) && !empty($description) && !empty($stock) && !empty($id_category)){

        $insert1 = $cnnPDO -> prepare('INSERT INTO product(id_product, student_id, name_product, description, price, stock, id_category) 
        VALUES (:id_product, :student_id, :name_product, :description, :price, :stock, :id_category)');

        $insert2 = $cnnPDO -> prepare('INSERT INTO image (id_images, id_product, image_1)  
        VALUES (:id_images, :id_product, :image_1)');

        $insert1->bindParam(':id_product',$id_product);
        $insert1->bindParam(':student_id',$student_id);
        $insert1->bindParam(':name_product',$name_product);
        $insert1->bindParam(':description',$description);
        $insert1->bindParam(':price',$price);
        $insert1->bindParam(':stock',$stock);
        $insert1->bindParam(':id_category',$id_category);

        $insert2->bindParam(':id_images',$id_images);
        $insert2->bindParam(':id_product',$id_product);
        $insert2->bindParam(':image_1',$image_1, PDO::PARAM_LOB);


        $insert1->execute();
        $insert2->execute();
        unset($insert);
        unset($insert2);
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
            <div>
                <label for="formFileLg" class="form-label text-bg-dark">Seleccione Una Imagen Del Poducto</label>
                <input name="image1" accept="image/jpg" class="form-control form-control-lg text-bg-dark" id="formFileLg" type="file">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                <input name="name_product" type="text" class="form-control text-bg-dark" id="exampleFormControlInput1" placeholder="Titulo Del Producto">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                <textarea name="description" class="form-control text-bg-dark" id="exampleFormControlTextarea1" rows="3" placeholder="Escriba una Descripcion"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stock</label>
                <input name="stock" type="number" class="form-control text-bg-dark" id="exampleFormControlInput1" placeholder="Stock">
            </div>
            <select name="id_category" class="form-select form-select-lg mb-3 text-bg-dark" aria-label="Large select example">
                <option selected>Categoria</option>
            <?php
                $select = $cnnPDO->prepare('SELECT * FROM category');
                $select -> execute();
                $count = $select-> rowCount();
                $colum = $select -> fetchAll();
                foreach ($colum as $data) {
                echo '<option value="'.htmlentities($data['id_category']).'">'.htmlentities($data['name_category']).'</option>';
                }
?>                
            </select>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button name="reg_prod" class="btn btn-success" type="submit">Publicar</button>
                <a  class="btn btn-success" type="button" href="main_window.php">Regresar</a>
            </div>
        </form>
    </div>
</body>
</html>