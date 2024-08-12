<?php
require 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-mis-pedidos">
    <div class="container-mis-pedidos">
        <h2>Mis Pedidos</h2>
        <div class="pedido">
            <div class="pedido-contenido">
                <div class="img-pedidos">
                    <img src="https://d22k5h68hofcrd.cloudfront.net/catalog/product/cache/b3b166914d87ce343d4dc5ec5117b502/7/F/7F213LT-1_T1680201707.png" alt="Producto">
                </div>
                <div class="pedido-header">
                    <h3>Pedido #12345</h3>
                    <p>Fecha: 10 de agosto de 2024</p>
                    <p>Estado: Enviado</p>
                </div>
                <div class="detalle-pedido">
                    <h4>Detalles del Producto</h4>
                    <p>Nombre del Producto</p>
                    <p>Cantidad: 1</p>
                    <p>Precio: $100.00</p>
                </div>
            </div>
            <div class="pedido-footer">
                <p>Total: $100.00</p>
                <button>Ver Más Detalles</button>
            </div>
        </div>
        
    </div>
</body>
</html>
