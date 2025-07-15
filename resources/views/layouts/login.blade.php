
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ url('/') }}/images/logos/logo.ico">
    <title>Login | JCI Tunari</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ url('/') }}/js/script.js"></script>
    <link rel="stylesheet" href="{{ url('/') }}/css/styles.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/figuras.css">
    <script src="{{ url('/') }}/js/scrollreveal.js"></script>
    
</head>

<body>
    <span id="loadPage">
        <div>
            <img src="{{ url('/') }}/images/logos/loading.jpg" alt="" width="100%">
        </div>
    </span>
    <div class="m-0 p-5 row justify-content-center align-items-center login" id="login">
        <div class="col-md-4" style="position: relative; z-index: 10">
            <div class="container-img">
            <img src="{{ url('/') }}/images/logos/logo.png" alt="" width="100%" style="position: relative; z-index:100">
            </div>
            <form method="POST" action="">
              @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control shadow-none" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="password" class="form-control shadow-none" id="password" name="password" value="{{ old('password') }}">
                  @error('password')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                @error('message')
                <small class="text-danger" role="alert">
                    {{ $message }}
                </small>
                @enderror
                <div class="d-grid gap-2">
                <button type="submit" id="submit" class="btn btn-login" onclick="executeProcess()">Iniciar sesión</button>
                </div>
                <div class="d-grid gap-2">
                    <a class="btn btn-login2" href="{{ route('inicio') }}">Volver a página principal</a>
                </div>
              </form>
        </div>
        <div class="relative">
            <div class="figura figuraMediana colorSecond left-350">
            </div>
        </div>
        <div class="relative">
            <div class="figura figuraPequena colorFirst right50"></div>
        </div>
    </div>
</body>
