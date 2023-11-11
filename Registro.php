<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SING UP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" media="screen" href="./indexStyle.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body {
            background-color: #b9cdda;
            font-family: "Roboto", sans-serif;
        }
        legend,
        label {
            color: white;
            font-size: 32px;
        }
        .FormularioRegistrarse {
            background-color: #2b303a;
            margin: 2% 20% 2% 20%;
            padding: 8%;
            border-radius: 50px;
        }
    </style>
</head>

<body>
    <form class="FormularioRegistrarse" action="./excepciones.php" method="POST">
        <legend class="text-center">Registrarse</legend>

        <fieldset>
            <div class="form-group">
                <label class="form-label mt-4">Nombre</label>
                <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="nombre" required />
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Apellido Paterno</label>
                <input type="text" class="form-control" id="Apellidop" placeholder="Apellido Paterno"
                    name="apellido_paterno" required />
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Apellido Materno</label>
                <input type="text" class="form-control" id="Apellidosm" placeholder="Apellido Materno"
                    name="apellido_materno" required />
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Correo Electronico</label>
                <input type="email" class="form-control" id="Email" placeholder="Ingrese un Correo Electronico"
                    name="correo" required />
            </div>

            <div class="form-group">
                <label class="form-label mt-4">Contraseña</label>
                <input type="password" class="form-control" id="pass" placeholder="Ingrese una contraseña"
                    name="contrasena" required />
            </div>

            <div class="form-group">
                <a class="form-label mt-5" href="">¿Ya tienes cuenta?</a>
            </div>

            <div class="text-center mt-5">
                <input type="submit" value="Registrarse" class="btn btn-lg btn-success btn-block" />
            </div>
        </fieldset>
    </form>
    <script>
        // mostrar la notificación después de enviar el formulario
        <?php if ($_GET['enviado'] == 'false') { ?>
            
        <?php } 
        if ($_GET['enviado'] == 'true') { ?>
            swal("Correo Duplicado", "¡El correo electronico ya existe!", "error");
        <?php } ?>
    </script>
</body>
</html>