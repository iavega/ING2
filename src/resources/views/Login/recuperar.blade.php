<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Contraseña</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container-fluit">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-5">
      <h2>Registrarse</h2>
      <form action="{{ action('App\Http\Controllers\usuarioController@recuperarContrasena')}}" method="POST">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row ">
            <div class="col">
              <div class="mb-3">
                <label for="formFile" class="form-label">Ingrese su correo para recuperar su contraseña</label>
                <input type="text" name="Email" id="form6Example1" value="" class="form-control" />
              </div>
            </div>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block ">Recuperar</button>
        </form>

      </div>
    </div>
  </div>
  <script
  src="https://code.jquery.com/jquery-3.6.0.slim.js"
  integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
  </script>
</body>
</html>