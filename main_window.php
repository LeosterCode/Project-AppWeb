<?php
session_start();
ob_start();
require 'db_conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <script src="https://kit.fontawesome.com/b1473ebfe8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="body-main_window">
  <nav class="navbar navbar-expand-lg color-bg" data-bs-theme="dark">
    <div class="container-fluid ">
      <a class="navbar-brand" href="main_window.php" style="color: rgb(255, 255, 255);">Halcon Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: rgba(100, 100, 100, 0.265);">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-bars"></i> Menu
            </a>
            <ul class="dropdown-menu custom-anchor" style="background-color: black;">
              <li><a class="dropdown-item" href="vender.php"><i class="fa-solid fa-calendar-check"></i> Vender </a></li>
              <li><a class="dropdown-item" href="#footer"><i class="fa-solid fa-user"></i> Acerca de nosotros
                </a></li>
            </ul>
          </li>
          <label class="close perfil-modal" for="btn-modal-perfil" class="dropdown-item"><i class="fa-solid fa-user"></i> Perfil </label>


          <input type="checkbox" id="btn-modal-perfil">
          <div class="container-modal-perfil">
            <div class="content-modal-perfil">
              <div class="mi-perfil">
                <div class="img-perfil"><?php echo '<img src="data:image/png;base64,' . base64_encode($_SESSION['pic_profile']) . '" alt="">'; ?></div>
                <h5>Nombre: <?php echo $_SESSION['name']; ?> </h5>
                <h5>Matricula: <?php echo $_SESSION['student_id']; ?> </h5>
                <ul class="menu">
                  <li><a href="my_products.php"><i class="fa-solid fa-arrow-up"></i> Mis Publicaciones</a></li>
                  <li><a href="mis_pedidos.php"><i class="fa-solid fa-clock-rotate-left"></i> Historial De Compras</a></li>
                  <li>
                    <label class="close" for="btn-modal-editar" class="dropdown-item"><i class="fa-regular fa-pen-to-square"></i> Editar Perfil </label>
                      <?php
                      if (isset($_POST['edit'])){
                        $load_image = $_FILES['new_pic']['tmp_name'];
                        $pic_profile=null;
                        $pic_profile = fopen($load_image, 'rb');
                        $password = $_POST['new_password']; 
                        $name = $_POST['new_name'];

                        if(!empty($name) && !empty($password)){
                          $edit = $cnnPDO->prepare('UPDATE user SET pic_profile=:pic_profile, password=:password, name=:name WHERE student_id = :student_id');
                          $edit->bindParam(':name',$name);
                          $edit->bindParam(':password',$password);
                          $edit->bindParam(':pic_profile',$pic_profile,PDO::PARAM_LOB);
                          $edit->bindParam(':student_id',$_SESSION['student_id']);
                          $edit->execute();

                          $_SESSION['name'] = $name;
                          $_SESSION['password'] =$password;

                          $get_image = $cnnPDO->prepare('SELECT pic_profile FROM user WHERE student_id = :student_id');
                          $get_image->bindParam(':student_id', $_SESSION['student_id']);
                          $get_image->execute();

                          $result = $get_image->fetch(PDO::FETCH_ASSOC);
                          $_SESSION['pic_profile'] = $result['pic_profile'];

                          header('location:main_window.php');

                        }
                      }
                      ?>
                    <input type="checkbox" id="btn-modal-editar">
                    <div class="container-modal-editar">
                      <div class="content-modal-editar">
                        <h2>Editar Perfil</h2>
                        <form enctype="multipart/form-data" method="post">
                          <div class="form-floating mb-2">
                            <input name="new_pic"  type="file" class="custom-file-input-editar">
                            <label for="floatingInput" class="label-editar">Foto</label>
                          </div>
                          <div class="form-floating mb-4">
                            <input name="new_password" value="<?php echo $_SESSION['password']?>" class="input-editar" type="text">
                            <label class="label-editar">Password</label>
                          </div>  
                          <div class="form-floating">
                            <input name="new_name" value="<?php echo $_SESSION['name']?>" class="input-editar" type="text">
                            <label class="label-editar">Nombre</label>
                          </div> 
                            <br>
                            <div class="d-grid gap-3 col-7 mx-auto">
                              <button class="btn btn-light" type="submit" name="edit">Guardar</button>
                            </div>
                        </form>
                        <div class="btn-cerrar-editar">
                          <label for="btn-modal-editar">Cerrar</label>
                        </div>
                      </div>
                      <label for="btn-modal-editar" class="cerrar-modal"></label>
                  </li>
                  <li><a class="close" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesion</a></li>
                </ul>
              </div>
            </div>
            <label for="btn-modal-perfil" class="cerrar-modal-perfil"></label>
          </div>
        </ul>
        <form class="d-flex position" role="search" action="buscar.php" method="GET">
          <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        <label class="close" for="btn-modal" class="dropdown-item"><i class="fa-solid fa-cart-shopping"></i> Carrito de compras </label>

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
                  <?php
                  if (isset($_POST['delete'])) {
                    $p = $_POST['delete'];
                    $delete = $cnnPDO->prepare('DELETE FROM shopping_cart WHERE id_product =?');
                    $delete->execute([$p]);
                  }

                  $sc = $cnnPDO->prepare('SELECT * FROM shopping_cart WHERE student_id =?');
                  $sc->execute([$_SESSION['student_id']]);
                  $count_car = $sc->rowCount();
                  $col_car = $sc->fetchAll();

                  if ($count_car) {


                    foreach ($col_car as $data) {

                      echo '<form method="POST">  
                      <tr>
                      <td>' . $data['name_product'] . '</td>
                      <td>' . $data['amount'] . '</td>
                      <td>' . $data['price'] . '</td>
                      <td>' . $data['total'] . '</td>
                      <td><button value="' . $data['id_product'] . '" name="delete" type="submit"><i class="fa-solid fa-trash"></i></button></td>
                      </tr>
                    </form>
                  ';
                    }
                  }
                  $sum = $cnnPDO->prepare('SELECT SUM(total) FROM shopping_cart WHERE student_id = ?');
                  $sum->execute([$_SESSION['student_id']]);
                  $pay = $sum->fetchColumn();
                  ?>
                  <tfoot>
                    <tr class="total-row">
                      <td colspan="4">Total General:</td>
                      <td><?php echo '$' . $pay . '.00 MXN';  ?></td>
                    </tr>
                  </tfoot>

                </table>
              </div>
            </div>
            <form method="post" action="comprar.php">
              <button name="buy" class="boton-comprar">comprar</button>
            </form>
            <div class="btn-cerrar">
              <label for="btn-modal">cerrar</label>
            </div>
          </div>
          <label for="btn-modal" class="cerrar-modal"></label>
        </div>
      </div>
    </div>
  </nav>

  
  <?php
  $select_cat = $cnnPDO->prepare('SELECT * FROM category');
  $select_cat->execute();
  $column_cat = $select_cat->fetchAll(PDO::FETCH_ASSOC);

  $items_per_slide = 3;
  $total_items = count($column_cat);
  $slides = ceil($total_items / $items_per_slide);
  ?>

  <div class="title-categorias">
    <h1>Categorias</h1>
  </div>
  <div class="categoriass">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner" style="margin:auto;">
        <?php
        for ($i = 0; $i < $slides; $i++) {
          $start = $i * $items_per_slide;
          $end = min($start + $items_per_slide, $total_items);
          $active_class = ($i === 0) ? 'active' : '';
          echo '<div class="carousel-item ' . $active_class . '">';
          echo '<div class="imagenes-de-carrusel row">';

          for ($j = $start; $j < $end; $j++) {
            $img_car = $column_cat[$j];
            echo '<div class="col-3 mx-2 audifonos">';
            echo '  <a href="categories.php?slug=' . htmlentities($img_car['slug_category']) . '">';
            echo '    <img src="data:image/png;base64,' . base64_encode($img_car['image_category']) . '" alt="">';
            echo '  </a>';
            echo '</div>';
          }

          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="title-productos">
    <h1>Productos</h1>
  </div>

  <div class="container-cards">
    <?php
    $select = $cnnPDO->prepare('SELECT * FROM product WHERE student_id <> :student_id');
    $select->bindParam(':student_id', $_SESSION['student_id']);
    $select->execute();
    $column = $select->fetchAll(PDO::FETCH_ASSOC);

    echo '  <div class="cards">';
    foreach ($column as $data) {
      echo '  <div class="card border-dark mx-3 mb-3" style="max-width: 18rem;">';
      echo '    <img src="data:image_png;base64,' . base64_encode($data['image_1']) . '" class="card-img-top" alt="...">';
      echo '    <div class="card-body">';
      echo '      <h5 class="card-name">' . htmlentities($data['name_product']) . '</h5>';
      echo '      <p class="card-text">Disponibles: ' . htmlentities($data['stock']) . '</p>';
      echo '      <p class="card-text">Precio: $' . htmlentities($data['price']) . '</p>';

      echo '    </div>';
      echo '      <a href="window_product.php?slug=' . htmlentities($data['slug_product']) . ' " >Ver producto</a>';
      echo '  </div>';
    }
    echo '</div>';



    ?>
    </div>
    <footer id="footer">
      <h1>Información sobre la página</h1>
      <br>
      <div class="footer-content">
        <div class="footer-links">
          <h4>Información Legal</h4>
          <ul>
            <li><a href="/privacy-policy">Política de Privacidad</a></li>
            <li><a href="/terms-of-service">Términos de Servicio</a></li>
            <li><a href="/faq">Preguntas Frecuentes</a></li>
          </ul>
        </div>
        <div class="footer-social">
          <h4>Contactos</h4>
          <a href="https://facebook.com/mitienda" target="_blank"><i class="fa-brands fa-facebook"></i>  Facebook</a>
          <a href="https://twitter.com/mitienda" target="_blank"> <i class="fa-brands fa-twitter"></i> Twitter</a>
          <a href="https://instagram.com/mitienda" target="_blank"> <i class="fa-brands fa-instagram"></i>
            Instagram</a>
        </div>
      </div>
    </footer>
</body>
<?php
ob_end_flush(); 
?>
</html>