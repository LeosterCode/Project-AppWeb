<?php
session_start();
require 'db_conexion.php';

if (isset($_POST['buy'])) {
    try {
 
        $cnnPDO->beginTransaction();

        $select = $cnnPDO->prepare('SELECT date, id_product, amount, student_id, total FROM shopping_cart WHERE student_id= ?');
        $select->execute([$_SESSION['student_id']]);
        $count = $select->rowCount();
        $fetch_select = $select->fetchAll();

        if ($count) {
            foreach($fetch_select as $purch) {

                $date_purchase = date('Y-m-d');
                $up_product = $purch['id_product'];
                $up_stock = $purch['amount'];
                $ins_total = $purch['total'];

         
                $update = $cnnPDO->prepare('UPDATE product SET stock = stock - ? WHERE id_product = ?');
                $update->execute([$up_stock, $up_product]);


                $insert = $cnnPDO->prepare('INSERT INTO purchase (total, date, student_id) VALUES (?,?,?)');
                $insert->execute([$ins_total, $date_purchase, $_SESSION['student_id']]);
            }

         
            $delete = $cnnPDO->prepare('DELETE FROM shopping_cart WHERE student_id = ?');
            $delete->execute([$_SESSION['student_id']]);

     
            $cnnPDO->commit();

  
            header('location:main_window.php');
            exit();
        } else {
   
            echo  ' <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                        <strong>Carrito Vacio</strong> No hay productos en el carrito.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }

    } catch (Exception $error) {
 
        $cnnPDO->rollBack();
        echo 'Error en la compra: ' . $error->getMessage();
    }
} else {
    echo  ' <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                <strong>Error</strong> No se pudo realizar la compra.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>
