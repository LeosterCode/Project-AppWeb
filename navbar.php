<?php
require 'cdn.html';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b1473ebfe8.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
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
                <div class="img-perfil"><img src="https://pm1.aminoapps.com/7933/780e7616157d238903727816597e4c1c36aa7b98r1-372-371v2_uhq.jpg" alt=""></div>

                <h5>Nombre: <?php echo $_SESSION['name']; ?> </h5>
                <h5>Matricula: <?php echo $_SESSION['student_id']; ?> </h5>
                <ul class="menu">
                  <li><a href="my_products.php"><i class="fa-solid fa-arrow-up"></i> Mis Publicaciones</a></li>
                  <li><a href="#"><i class="fa-solid fa-clock-rotate-left"></i>  Historial De Compras</a></li>
                  <li>
        <label class="close" for="btn-modal-editar" class="dropdown-item"><i class="fa-regular fa-pen-to-square"></i> Editar Perfil </label>

        <input type="checkbox" id="btn-modal-editar">
        <div class="container-modal-editar">
          <div class="content-modal-editar">
            <h2>Editar Perfil</h2>
            <form action="" method="post">
                      <div class="form-floating mb-2">
                      <input type="file" class="custom-file-input-editar" name="nombre" required>
                      <label for="floatingInput" class="label-editar">Foto</label>
                      </div>
                      <div class="form-floating">
                      <input class="input-editar" type="password" name="password" required>
                      <label class="label-editar">Password</label>
                      <br>
                      <div class="d-grid gap-3 col-7 mx-auto">
                      <button class="btn btn-light" type="submit" name="actualizar">Guardar</button>
                      </div>
                      </form>
                      <div class="btn-cerrar-editar">
                    <label for="btn-modal-editar">cerrar</label>
                  </div>
                </div>
                  <label for="btn-modal-editar" class="cerrar-modal"></label>
                </li>
                  <li><a class="close" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> cerrar Sesion</a></li>
                </ul>
              </div>
            </div>
            <label for="btn-modal-perfil" class="cerrar-modal-perfil"></label>
          </div>
        </ul>
        <form class="d-flex position" role="search" action="buscar.php" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Buscar" aria-label="Search">
            <button  class="btn btn-outline-success" type="submit">Buscar</button>
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
                  <tr>
                    <td>Producto 1</td>
                    <td>2</td>
                    <td>$10.00</td>
                    <td>$20.00</td>
                    <td><button><i class="fa-solid fa-trash"></i></button></td>
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
      </div>
    </div>
  </nav>


</body>

</html>