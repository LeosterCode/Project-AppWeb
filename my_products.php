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
    <title>Document</title>
</head>

<body>
    <?php
    $select = $cnnPDO->prepare('SELECT * FROM product WHERE student_id = ?');
    $select->execute([$_SESSION['student_id']]);
    $count = $select->rowCount();
    $column = $select->fetchAll(PDO::FETCH_ASSOC);

    if ($count) {
        try {
            echo '<div class="container mt-5">';
            echo '   <div class="row">';
            foreach ($column as $data) {
                echo '       <div class="col-md-3 mb-4">';
                echo '           <div class="card" style="width: 250px; border:solid 1px black; box-shadow: 0 3px 15px">';
                echo '               <img src="data:image_png;base64,' . base64_encode($data['image_1']) . '" class="card-img-top" alt="...">';
                echo '               <div class="card-body">';
                echo '                   <p>id producto:  ' . htmlentities($data["id_product"]) . '</p <br>';
                echo '                   <p>Matricula:  ' . htmlentities($data["student_id"]) . '</p <br>';
                echo '                   <p>Nombre:  ' . htmlentities($data["name_product"]) . '</p <br>';
                echo '                   <p>Descripcion:  ' . htmlentities($data["description"]) . '</p <br>';
                echo '                   <p>Precio:  ' . htmlentities($data["price"]) . '</p <br>';
                echo '                   <p>Stock:  ' . htmlentities($data["stock"]) . '</p <br>';
                echo '                   <p>Categoria:  ' . htmlentities($data["id_category"]) . '</p <br>';
                echo '               </div>';
                echo '           </div>';
                echo '       </div>';
            }
            echo '   </div';
            echo '</div>';
        } catch (PDOException $error) {
            echo 'ERROR EN LA BASE DE DATOS' . $error->getMessage();
        }
    } else {
        echo "No tienes productos registrados";
    }
    ?>

</body>

</html>