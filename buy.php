<?php 
require_once 'db.conexion.php';
session_start();


$delete = $cnnPDO->prepare('DELETE FROM shopping_cart WHERE id_product =?');

$delete->execute([])
?>