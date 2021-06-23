<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('logo.png')}}"  id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="{{ action('App\Http\Controllers\loginController@verificarlogin') }}" method="POST">
      @csrf
      <input type="text" id="login" class="fadeIn second" name="user" placeholder="Usuario">
      <input type="text" id="password" class="fadeIn third" name="passwd" placeholder="Contraseña">
      <input type="submit" class="fadeIn fourth" value="Iniciar Seccion">
      <a href="{{ action('App\Http\Controllers\loginController@registrarse') }}" class="btn-registrarse" >Registrarse</a>
    </form>
    <div class="text-danger">
      @if(!empty(session('error')))
        <span class="error">{{ session('error') }}</span>
      @endif
    </div>
    <div class="">
      @if(!empty(session('successful')))
        <span class="badge bg-success">{{ session('successful') }}</span>
      @endif
    </div>
    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="{{ action('App\Http\Controllers\loginController@recuperar') }}">Ha olvidado la contraseña?</a>
    </div>

  </div>
</body>
</html>