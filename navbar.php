<?php
require 'cdn.html';
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


              <li><a class="dropdown-item" href="#footer"> <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M185-80q-17 0-29.5-12.5T143-122v-105q0-90 56-159t144-88q-40 28-62 70.5T259-312v190q0 11 3 22t10 20h-87Zm147 0q-17 0-29.5-12.5T290-122v-190q0-70 49.5-119T459-480h189q70 0 119 49t49 119v64q0 70-49 119T648-80H332Zm148-484q-66 0-112-46t-46-112q0-66 46-112t112-46q66 0 112 46t46 112q0 66-46 112t-112 46Z" />
                  </svg> Acerca de nosotros
                </a></li>
            </ul>
          </li>
          <label class="close perfil-modal" for="btn-modal-perfil" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
              <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
            </svg> Perfil </label>


          <input type="checkbox" id="btn-modal-perfil">
          <div class="container-modal-perfil">
            <div class="content-modal-perfil">
              <div class="mi-perfil">
                <div class="img-perfil"><img src="https://pm1.aminoapps.com/7933/780e7616157d238903727816597e4c1c36aa7b98r1-372-371v2_uhq.jpg" alt=""></div>

                <h5>Nombre: <?php echo $_SESSION['name']; ?> </h5>
                <h5>Matricula: <?php echo $_SESSION['student_id']; ?> </h5>
                <ul class="menu">
                  <li><a href="my_products.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z" />
                      </svg> Mis Publicaciones</a></li>

                  <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" />
                      </svg> Historial De Compras</a></li>

                  <li>
      <label class="close" for="btn-modal-editar" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
        </svg> Editar Perfil </label>

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
                      <button  type="submit" name="actualizar">Guardar</button>
                      </div>
                      </form>
            <div class="btn-cerrar-editar">
              <label for="btn-modal-editar">cerrar</label>
            </div>
          </div>
          <label for="btn-modal-editar" class="cerrar-modal"></label>
          </li>

                  <li><a class="close" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
          </svg>  cerrar Sesion</a></li>
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
      </div>
    </div>
  </nav>


</body>

</html>