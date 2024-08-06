<?php
session_start();
require 'db_conexion.php';

 if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $search = $cnnPDO->prepare('SELECT * FROM user WHERE email = ? AND password = ? ');
    $search -> execute([$email,$password]);
    $count = $search -> rowCount();
    $colum = $search ->fetch();
    
    if ($count) {
        $_SESSION['student_id'] = $colum['student_id'];
        $_SESSION['name'] = $colum['name'];

        header('location:main_window.php');
    
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-login">
    <div class="container-login">
        <div class="formulario">
            <form action="" method="post">
                <h1 class="titulo-login">Login</h1>
                <input name="email" class="input-nombre" type="email" required spellcheck="false">
                <label class="label-nombre">Email</label>
                <input name="password" class="input-password" type="password" required spellcheck="false">
                <label class="label-password">Password</label>
                <a href="#"><p class="olv">¿Olvidaste tu contraseña?</p></a>
                <button name="login" class="boton-login">Login</button>
                <p class="reg">¿Aún no estás registrado? <a class="buttons" href="registrar.php">Registarte</a></p>
            </form>
        </div>
    </div>
</body>
</html>