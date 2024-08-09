<?php
require 'db_conexion.php';
session_start();
require 'navbar.php';
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];

    $select = $cnnPDO->prepare('SELECT * FROM product WHERE slug_product = :slug_product');
    $select->bindParam(':slug_product', $slug);
    $select->execute();
    $column = $select->fetch(PDO::FETCH_ASSOC);
} else {
    echo '<p>No se encontro el producto</p>';
}

if (isset($_POST['save_comm'])) {
    $id_review = rand(1, 999);
    $comment = $_POST['comment'];
    $student_id = $_SESSION['student_id'];
    $date_review = date("Y,m,d");
    $id_product = $column['id_product'];
    $name_student = $_SESSION['name'];

    if (!empty($id_review) && !empty($comment) && !empty($student_id) && !empty($date_review) && !empty($id_product) && !empty($name_student)){

    $ins_comm = $cnnPDO->prepare('INSERT INTO review (id_review, id_product, name_student, student_id, comment, date_review)VALUES (:id_review, :id_product, :name_student, :student_id, :comment, :date_review)');
    $ins_comm->bindParam(':id_review', $id_review);
    $ins_comm->bindParam(':id_product', $id_product);
    $ins_comm->bindParam(':name_student', $name_student);
    $ins_comm->bindParam(':student_id', $student_id);
    $ins_comm->bindParam(':comment', $comment);
    $ins_comm->bindParam(':date_review', $date_review);

    $ins_comm->execute();
    
    
?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>EXITO</strong> El comentario se publico con exito 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlentities($column['name_product']) ?></title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="body-detalles">
    <div class="container-detalles">
        <div class="detalles-imagen">
            <div class="carrusel-detalles">
                <div id="carouselExampleFade" class="carousel slide carousel-fade">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="imagnes-carrusel-detalles" src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/franchise/alienware-laptops/dell-alienware-lt-franchise-cd-1920x1440-x16-mod03-collapsed-1.png?fmt=png-alpha&wid=1920&hei=1440" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="imagnes-carrusel-detalles" src="https://unaluka.com/cdn/shop/files/B0C3FBFCNG_2_1200x1200.jpg?v=1689380717" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="imagnes-carrusel-detalles" src="https://m.media-amazon.com/images/I/61-lXvvhBtS._AC_UF894,1000_QL80_.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="imagnes-carrusel-detalles" src="https://m.media-amazon.com/images/I/7111yvAR-bL._AC_UF894,1000_QL80_.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="imagnes-carrusel-detalles" src="https://m.media-amazon.com/images/I/61-lXvvhBtS._AC_UF894,1000_QL80_.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
        <div class="detalles-texto">
            <h4><?php echo htmlentities($column['name_product']) ?> </h4>
            <p><b>Descripcion:</b> <?php echo htmlentities($column['description']) ?></p>
            <p><b>Precio: </b> <?php echo htmlentities($column['price']) ?></p>
            <p><b>Stock: </b><?php echo htmlentities($column['stock']) ?></p>
            <p><b>Categoria:</b> <?php echo htmlentities($column['name_category']) ?></p>

            <input type="number" placeholder="1" value="1" min="1" class="input-quantity" />
            <button class="button-añadir-carrito">Añadir al carrito</button>
        </div>
    </div>
    <div class="comentarios">
        <h2>Comentarios</h2>
        <div class="comentario">
            <form method="post" action="">
                <textarea name="comment" placeholder="Agregar Comentario"></textarea>
                <button name="save_comm" type="submit" class="button-añadir-carrito">Publicar</button>
            </form>

            <?php
            $slct_rev = $cnnPDO->prepare('SELECT * FROM review WHERE id_product = :id_product');
            $slct_rev->bindParam(':id_product', $column['id_product']);
            $slct_rev->execute();
            $count = $slct_rev->rowCount();
            $col = $slct_rev->fetchAll();
            if ($count) {

                echo '<div class="comentarios-publicados">';
                foreach ($col as $data) {
                    echo '<div class="comentario-del-usuario">';
                    echo '    <div>';
                    echo '        <img src="https://masterpiecer-images.s3.yandex.net/05582065717511ee954256181a0358a2:upscaled" alt="">';
                    echo '    </div>';
                    echo '    <div>';
                    echo '        <p><b>' . htmlentities($data['name_student']) . '</b></p>';
                    echo '        <p><b>comentario:</b>' . htmlentities($data['comment']) . ' </p>';
                    echo '    </div>';
                    echo '</div>';
                }
                echo '</div>';
            } else echo 'Tu producto no tiene comentarios';

            ?>

        </div>
        
    </div>
</body>

</html>




</body>

</html>