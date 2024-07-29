<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="image2">
    <div class="campo-2">
        <div class="formulario2">
            <h1>Registrar</h1>
            <div class="form">
                <form action="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Matricula">
                        <label for="floatingInput">Matricula</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Nombre">
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="correo">
                        <label for="floatingInput">Correo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Carrera">
                        <label for="floatingInput">Carrera</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Edificio">
                        <label for="floatingInput">Edificio</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <?php
                        # Inicia Código de REGISTRAR

                        if (isset($_POST['registrar'])) {
                            $matricula = $_POST['matricula'];
                            $nombre = $_POST['nombre'];
                            $correo = $_POST['correo'];
                            $carrera = $_POST['carrera'];
                            $edificio = $_POST['edificio'];
                            $password = $_POST['password'];

                            if (!empty($matricula) && !empty($nombre) && !empty($correo) && !empty($carrera) && !empty($carrera) && !empty($edificio) && !empty($password)) {




                                $sql = $cnnPDO->prepare("INSERT INTO alumnos
                            (matricula, nombre, correo, carrera, edificio, password) VALUES (:matricula, :nombre, :correo, :carrera, :edificio, :password)");

                                $sql->bindParam(':matricula', $matricula);
                                $sql->bindParam(':nombre', $nombre);
                                $sql->bindParam(':correo', $correo);
                                $sql->bindParam(':carrera', $carrera);
                                $sql->bindParam(':edificio', $edificio);
                                $sql->bindParam(':password', $password);

                                $sql->execute();
                                unset($sql);
                                unset($cnnPDO);
                        ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>REGISTRO</strong> Sus datos fueron enviados
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> Tienes campos vacios
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                        <?php
                            }
                        }
                        # Termina Código de REGISTRAR
                        ?>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" type="button" href="index.html">Registrar</a>
                            <p>¿Ya Tienes Cuenta? <a class="olv-con" href="index.html">Iniciar Sesion</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>