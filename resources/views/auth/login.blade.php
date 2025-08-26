<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Entregas con la mejor nota</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('icon/favicon.png') }}" type="image/png">

</head>

<body
    style="background: radial-gradient(ellipse at center, #ff6f61 0%, #ff3c3c 60%, #b71c1c 100%), linear-gradient(135deg, #ff3c3c 0%, #ff6f61 50%, #b71c1c 100%); min-height: 100vh;">

    <div class="container d-flex justify-content-center align-items-center fade" style="min-height: 100vh;">
        <!-- Outer Row -->
        <div class="row w-100 justify-content-center align-items-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido de nuevo!</h1>
                                    </div>
                                    <form method="POST" class="user" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Correo electrónico...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="exampleInputPassword"
                                                placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recuérdame</label>
                                            </div>
                                        </div>
                                        {{-- <a href="index.html" class="btn btn-primary bt-nuser btn-block">
                                            Iniciar sesión
                                        </a> --}}
                                        <button type ="submit" class="btn btn-primary bt-nuser btn-block">Iniciar
                                            sesión</button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">¿Olvidaste tu
                                            contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('register') }}">¡Crear una cuenta!</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 bg-login-image d-flex justify-content-center align-items-center"
                                style="background: #fff; min-height: 400px; position: relative;">
                                <div
                                    style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); width: 320px; height: 320px; background: radial-gradient(circle at center, #ffd600 0%, #ffe066 80%, #ffd600 100%); border-radius: 50%; z-index: 1; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ asset('icon/icon.png') }}" alt="Logo"
                                        style="max-width: 70%; height: auto; position: relative; z-index: 2;">
                                </div>
                                <img src="{{ asset('icon/icon.png') }}" alt="Logo"
                                    style="max-width: 70%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var container = document.querySelector('.container.fade');
        setTimeout(function() {
          container.classList.add('show');
        }, 10); // fade-in 400ms
        document.querySelectorAll('a.small').forEach(function(link) {
          link.addEventListener('click', function(e) {
            if (link.getAttribute('href') && link.getAttribute('href').charAt(0) !== '#') {
              e.preventDefault();
              container.classList.remove('show');
              setTimeout(function() {
                window.location.href = link.href;
              }, 400); // fade-out 400ms
            }
          });
        });
      });
    </script>

</body>

</html>
