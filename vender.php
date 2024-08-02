<?php
require 'db_conexion.php';
session_start();
if(isset($_POST['reg_prod'])){
    $id_product = $_POST['id_product'];
    $name_product = $_POST['name_product'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $id_category = $_POST['id_category'];

    $insert = $cnnPDO -> prepare('INSERT INTO product(id_product, name_product, description, price, stock, id_category) 
    VALUES ()');
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
        <form action="">
            <div>
                <label for="formFileLg" class="form-label text-bg-dark">Seleccione Una Imagen Del Poducto</label>
                <input name="image1" class="form-control form-control-lg text-bg-dark" id="formFileLg" type="file">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                <input type="text" class="form-control text-bg-dark" id="exampleFormControlInput1" placeholder="Titulo Del Producto">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                <textarea class="form-control text-bg-dark" id="exampleFormControlTextarea1" rows="3" placeholder="Escriba una Descripcion"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stock</label>
                <input type="number" class="form-control text-bg-dark" id="exampleFormControlInput1" placeholder="Stock">
            </div>
            <select class="form-select form-select-lg mb-3 text-bg-dark" aria-label="Large select example">
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
                <button name="reg_prod" class="btn btn-success" type="button">Publicar</button>
                <a  class="btn btn-success" type="button" href="main_window.php">Regresar</a>
            </div>
        </form>
    </div>
</body>
</html>