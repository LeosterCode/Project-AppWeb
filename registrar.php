<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body-registrar">
    <div class="container-registrar">
        <div class="img-registrar"></div>
        <div class="formulario-registrar start">
            
            <form action="">
                <h1 class="titulo-registrar">Register</h1>
                <input class="input-matricula-registrar" type="text" required spellcheck="false">
                <label class="label-matricula-registrar">Matricula</label>

                <input class="input-nombre-registrar" type="text" required spellcheck="false">
                <label class="label-nombre-registrar">Nombre</label>
    
                <input class="input-email-registrar" type="email" required spellcheck="false">
                <label class="label-email-registrar">Email</label>

                <input class="input-numero-registrar" type="text" required spellcheck="false">
                <label class="label-numero-registrar">Numero</label>


                <select class="input-carrera-registrar">
                    <option value="opcion1"><p>Carrera</p></option>
                    <option value="opcion2"><p>Innovación de Negocios y Mercadotecnia</p></option>
                    <option value="opcion3"><p>Diseño y Gestión de Redes Logísticas</p></option>
                    <option value="opcion4"><p>Biotecnología</p></option>
                    <option value="opcion5"><p>Confiabilidad de Planta</p></option>
                    <option value="opcion6"><p>Desarrollo y Gestión de Software</p></option>
                    <option value="opcion7"><p>Entornos Virtuales y Negocios Digitales</p></option>
                    <option value="opcion8"><p>Energías Renovables</p></option>
                    <option value="opcion9"><p>Mecatrónica</p></option>
                    <option value="opcion10"><p>Metal Mecánica</p></option>
                    <option value="opcion11"><p>Nanotecnología</p></option>
                    <option value="opcion12"><p>Procesos y Operaciones Industriales</p></option>
                    <option value="opcion13"><p>Redes Inteligentes y Ciberseguridad</p></option>
                    <option value="opcion14"><p>Seguridad Ambiental Sustentable</p></option>
                    <option value="opcion15"><p>Maestría en Ingeniería para la Manufactura Inteligente</p></option>
                </select>

                <label class="label-carrera-registrar">Carrera</label>

                <select class="input-edificio-registrar">
                    <option value="opcion1"><p>Edificio</p></option>
                    <option value="opcion2"><p>Edificio 1</p></option>
                    <option value="opcion3"><p>Edificio 2</p></option>
                    <option value="opcion4"><p>Edificio 3</p></option>
                    <option value="opcion5"><p>Edificio 4</p></option>
                </select>

                <label class="label-edificio-registrar">Edificio</label>


                <input class="input-password-registrar" type="password" required spellcheck="false">
                <label class="label-password-registrar">Password</label>
    
                <button class="boton-registrar">Register</button>
                <p class="rega">¿Ya tienes cuenta? <a href="login.php" class="buttons">Login</a></p>
            </form>  
        </div>
        
    </div>
</body>
</html>
