<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SING UP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" media="screen" />
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      .swal-button--confirm {
        background-color: lightgreen; /* Cambia el color de fondo del botón */
        border-color: lightgreen; /* Cambia el color del borde del botón */
      }
    </style>
    <script>
      function registro() {
        var formData = $("#regis").serialize();
        $.ajax({
          type: "POST",
          data: formData,
          url: "../controlador/registroControlador.php?opc=1",
          success: function (data) {
            if (data === 'correo_duplicado') {
              // Muestra un mensaje de error si el correo ya está registrado
              swal({
                title: "Error",
                text: "¡El correo electrónico ya está registrado!",
                icon: "error",
                button: "OK",
              });
            } else {
              // Muestra un mensaje de éxito si el registro es exitoso
              swal({
                title: "¡Registro exitoso!",
                text: "Tu cuenta ha sido creada.",
                icon: "success",
                button: "OK",
              });
            }
            $("#mensajeRegistro").text(data);
          },
          error: function (xhr, status, error) {
            var errorMessage = xhr.responseText; // Opcional, puedes manejar mensajes de error aquí
            console.log("hola");
            $("#mensajeRegistro").text(errorMessage);
          },
        });
      }

      $(document).ready(function () {
        $("#regis").submit(function (event) {
          event.preventDefault(); // Evita el envío del formulario por defecto
          registro(); // Llama a la función insertar() para enviar los datos del formulario
        });
      });
    </script>
  </head>

  <body>
    <div id="mensajeRegistro"></div>
    <form class="FormularioRegistrarse" id="regis" method="POST">
      <legend class="text-center">Registrarse</legend>

      <fieldset>
        <div class="form-group">
          <label class="form-label mt-4">Nombre</label>
          <input
            type="text"
            class="form-control"
            id="Nombre"
            placeholder="Nombre"
            name="nombre"
            required
          />
        </div>

        <div class="form-group">
          <label class="form-label mt-4">Apellido Paterno</label>
          <input
            type="text"
            class="form-control"
            id="Apellido"
            placeholder="Apellido Paterno"
            name="apellido_paterno"
            required
          />
        </div>

        <div class="form-group">
          <label class="form-label mt-4">Apellido Materno</label>
          <input
            type="text"
            class="form-control"
            id="Apellidos"
            placeholder="Apellido Materno"
            name="apellido_materno"
            required
          />
        </div>

        <div class="form-group">
          <label class="form-label mt-4">Correo Electronico</label>
          <input
            type="email"
            class="form-control"
            id="Email"
            placeholder="Ingrese un Correo Electronico"
            name="correo"
            required
          />
        </div>

        <div class="form-group">
          <label class="form-label mt-4">Contraseña</label>
          <input
            type="password"
            class="form-control"
            id="pass"
            placeholder="Ingrese una contraseña"
            name="contrasena"
            required
          />
        </div>

        <div class="form-group">
          <a class="form-label mt-5" href="">¿Ya tienes cuenta?</a>
        </div>

        <div class="text-center mt-5">
          <input
            type="submit"
            value="Registrarse"
            class="btn btn-lg btn-success btn-block"
          />
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
