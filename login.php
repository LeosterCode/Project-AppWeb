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
    
    }
 } 

 $apiKey = '39c8a26f01db324b4c865460a55feb0039dbbf99';

 function verificarCorreo($email, $dominioPermitido, $apiKey) {
 
     $emailDomain = substr(strrchr($email, "@"), 1);
 
     if ($emailDomain !== $dominioPermitido) {
         return "Necesitas iniciar sesión con tu correo institucional.";
     }
 
     $url = "https://api.hunter.io/v2/email-verifier?email=" . urlencode($email) . "&api_key=" . $apiKey;
 
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
     $response = curl_exec($ch);
 
     if (curl_errno($ch)) {
         return 'Error en la solicitud: ' . curl_error($ch);
     }
 
     curl_close($ch);
 
     $data = json_decode($response, true);
 
     if (isset($data['data']['status']) && $data['data']['status'] == 'valid') {
         return "Necesitas iniciar sesión con tu correo institucional.";
     } else {
         return "El correo electrónico no es válido o no existe.";
     }
 }
 
 $resultado = "";
 
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $email = $_POST['email'];
     $password = $_POST['password'];
 
     $dominioPermitido = 'alumno.utc.edu.mx';
 
     $resultado = verificarCorreo($email, $dominioPermitido, $apiKey);
 
     if ($resultado === "El correo electrónico pertenece al dominio permitido y es válido.") {
   
         $resultado = "Inicio de sesión exitoso.";
 
         header("Location: main_window.php");
         exit();
     } else {
         $resultado = "Correo electrónico o contraseña incorrectos.";
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

