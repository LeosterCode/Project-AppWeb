<?php
session_start();
require 'db_conexion.php';
if (isset($_POST['buy'])){ 
    $date_purchase = date('Y-m-d'); 
    $select=$cnnPDO->prepare('SELECT date, id_product, amount, student_id, total FROM shopping_cart WHERE student_id= ?');
    $select->execute([$_SESSION['student_id']]);
    $count=$select->rowCount();
    $fetch_select = $select->fetch();

    $up_product = $fetch_select['id_product']; 
    $up_stock = $fetch_select['amount'];
    $ins_total = $fetch_select['total'];

    $update = $cnnPDO->prepare('UPDATE product SET stock = stock - ? WHERE id_product = ?');
    $update->execute([$up_stock, $up_product]);

    $id_purchase = rand(1,999);
    $insert = $cnnPDO->prepare('INSERT INTO purchase (id_purchase, total, date, student_id ) VALUES (?,?,?,?)');
    $insert->execute([$id_purchase, $ins_total, $date_purchase, $_SESSION['student_id']]);

    $delete=$cnnPDO->prepare('DELETE FROM shopping_cart WHERE student_id = ?');
    $delete->execute([$_SESSION['student_id']]);

    header('location:main_window.php');
}

?>