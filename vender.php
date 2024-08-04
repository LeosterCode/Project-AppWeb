<?php
require 'db_conexion.php';
session_start();
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
    <nav class="navbar navbar-expand-lg color-bg" data-bs-theme="dark">
        <div class="container-fluid ">
            <a class="navbar-brand" href="main_window.php" style="color: rgb(255, 255, 255);">Chishop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: rgba(100, 100, 100, 0.265);">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path d="M280-600v-80h560v80H280Zm0 160v-80h560v80H280Zm0 160v-80h560v80H280ZM160-600q-17 0-28.5-11.5T120-640q0-17 11.5-28.5T160-680q17 0 28.5 11.5T200-640q0 17-11.5 28.5T160-600Zm0 160q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520q17 0 28.5 11.5T200-480q0 17-11.5 28.5T160-440Zm0 160q-17 0-28.5-11.5T120-320q0-17 11.5-28.5T160-360q17 0 28.5 11.5T200-320q0 17-11.5 28.5T160-280Z" />
                            </svg>Menu
                        </a>
                        <ul class="dropdown-menu custom-anchor" style="background-color: black;">
                            <li><a class="dropdown-item" href="vender.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                        <path d="M80-160v-640h800v640H80Zm80-80h640v-480H160v480Zm0 0v-480 480Zm160-40h80v-40h40q17 0 28.5-11.5T480-360v-120q0-17-11.5-28.5T440-520H320v-40h160v-80h-80v-40h-80v40h-40q-17 0-28.5 11.5T240-600v120q0 17 11.5 28.5T280-440h120v40H240v80h80v40Zm320-30 80-80H560l80 80Zm-80-250h160l-80-80-80 80Z" />
                                    </svg> Vender </a></li>

                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                        <path d="M240-80q-50 0-85-35t-35-85v-120h120v-560l60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60 60 60 60-60v680q0 50-35 85t-85 35H240Zm480-80q17 0 28.5-11.5T760-200v-560H320v440h360v120q0 17 11.5 28.5T720-160ZM360-600v-80h240v80H360Zm0 120v-80h240v80H360Zm320-120q-17 0-28.5-11.5T640-640q0-17 11.5-28.5T680-680q17 0 28.5 11.5T720-640q0 17-11.5 28.5T680-600Zm0 120q-17 0-28.5-11.5T640-520q0-17 11.5-28.5T680-560q17 0 28.5 11.5T720-520q0 17-11.5 28.5T680-480ZM240-160h360v-80H200v40q0 17 11.5 28.5T240-160Zm-40 0v-80 80Z" />
                                    </svg> Pedidos
                                </a></li>

                            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                        <path d="M200-80q-33 0-56.5-23.5T120-160v-451q-18-11-29-28.5T80-680v-120q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v120q0 23-11 40.5T840-611v451q0 33-23.5 56.5T760-80H200Zm0-520v440h560v-440H200Zm-40-80h640v-120H160v120Zm200 280h240v-80H360v80Zm120 20Z" />
                                    </svg> Mis productos
                                </a></li>
                            <li><a class="dropdown-item" href="#footer"> <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                        <path d="M185-80q-17 0-29.5-12.5T143-122v-105q0-90 56-159t144-88q-40 28-62 70.5T259-312v190q0 11 3 22t10 20h-87Zm147 0q-17 0-29.5-12.5T290-122v-190q0-70 49.5-119T459-480h189q70 0 119 49t49 119v64q0 70-49 119T648-80H332Zm148-484q-66 0-112-46t-46-112q0-66 46-112t112-46q66 0 112 46t46 112q0 66-46 112t-112 46Z" />
                                    </svg> Acerca de nosotros
                                </a></li>
                        </ul>
                    </li>
                    <label class="close perfil-modal" for="btn-modal-perfil" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                            <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                        </svg> perfil </label>


                    <input type="checkbox" id="btn-modal-perfil">
                    <div class="container-modal-perfil">
                        <div class="content-modal-perfil">
                            <div class="mi-perfil">
                                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="">
                                <h5><?php echo $_SESSION['name']; ?> </h5>
                                <h5><?php echo $_SESSION['student_id']; ?> </h5>
                                <ul class="menu">
                                    <li><a href="my_products.php">Mis Publicaciones</a></li>
                                    <li><a href="#">Mis Pedidos</a></li>
                                    <li><a href="#">Historial De Compras</a></li>
                                    <li><a href="#">Cambiar Contraseña</a></li>
                                    <li><a href="#">Editar perfil</a></li>
                                </ul>
                            </div>
                        </div>
                        <label for="btn-modal-perfil" class="cerrar-modal-perfil"></label>
                    </div>


                </ul>
                <form class="d-flex position" role="search">
                    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <label class="close" for="btn-modal" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                    </svg> Carrito de compras </label>

                <input type="checkbox" id="btn-modal">
                <div class="container-modal">
                    <div class="content-modal">
                        <h2>Carrito De Compras</h2>
                        <div class="modal-products">
                            <div class="add-products">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Producto 1</td>
                                        <td>2</td>
                                        <td>$10.00</td>
                                        <td>$20.00</td>
                                        <td><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                                            </svg></td>
                                    </tr>
                                    <tfoot>
                                        <tr class="total-row">
                                            <td colspan="4">Total General:</td>
                                            <td>$56.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <button class="boton-comprar">comprar</button>
                        <div class="btn-cerrar">
                            <label for="btn-modal">cerrar</label>
                        </div>
                    </div>
                    <label for="btn-modal" class="cerrar-modal"></label>
                </div>

                <a class="close" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                    </svg>cerrar Sesion</a>
            </div>
        </div>
    </nav>

    <div class="container-vender">
        <h1> VENDER</h1>
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="formFileLg" class="form-label text-bg-dark">Seleccione Una Imagen Del Poducto</label>
                <input name="image_1" accept="image/jpg" class="form-control form-control-lg text-bg-dark" id="formFileLg" type="file">
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