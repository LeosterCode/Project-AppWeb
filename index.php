<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="campo-1">
        <div class="image"></div> 
        <div class="formulario">
            <h1>Iniciar Sesión</h1>
            <div class="form">
                <form action="">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <a class="olv-con" href="#">¿Olvidaste tu contraseña?</a>
                        <label for="floatingPassword">Password</label>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Login</button>
                        </div>
                        <p>¿Aún no estás registrado? <a class="olv-con" href="registrar.php">Regístrate</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>