<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container-fluit">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-5">
      <h2>Registrarse</h2>
      <form action="{{ action('App\Http\Controllers\loginController@registrarse_save')}}" method="POST">
          @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row ">
            <div class="col">
              <div class="mb-3">
                <label for="formFile" class="form-label">Nombre</label>
                <input type="text" name="Name" id="form6Example1" value="{{ old('Name') }}" class="form-control form-control-sm" />
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Nombre de Usuario</label>
                <input type="text" name="User" id="form6Example3" value="{{ old('User') }}"   class="form-control form-control-sm @error('User') is-invalid @enderror"" />
                @error('User')
                  <span class="error">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Contraseña</label>
                <input type="text" name="Password" id="form6Example6" value="{{ old('Password') }}"  class="form-control form-control-sm"  />
              </div>
            </div>
            <div class="col">
              <div class="mb-3">
                <label for="formFile" class="form-label">Apellido</label>
                <input type="text" name="LastName" id="form6Example2" value="{{ old('LastName') }}" class="form-control form-control-sm" />
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Correo</label>
                <input type="text" name="Email" id="form6Example4" value="{{ old('Email') }}" class="form-control form-control-sm @error('Email') is-invalid @enderror"/>
                @error('Email')
                  <span class="error">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Grupo</label>
                {{ Form::select('ID_Group',$list_group ,old('ID_Group'),['class'=>'form-control js-example-basic-single'] ) }} <br>
              </div>
            </div>
          </div>
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block ">Registrarse</button>
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