<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Entregas con la mejor nota</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('icon/favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('icon/favicon.png') }}" type="image/png">
</head>

<body style="background: radial-gradient(ellipse at center, #ff6f61 0%, #ff3c3c 60%, #b71c1c 100%), linear-gradient(135deg, #ff3c3c 0%, #ff6f61 50%, #b71c1c 100%); min-height: 100vh;">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-password-image text-center">
                        <img src="{{ asset('icon/icon.png') }}" alt="Logo" style="max-width: 70%; height: auto; margin-top: 40px;">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                                <p class="mb-4">No te preocupes, solo ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>
                            </div>
                            <form method="POST" action="{{ route('password.email') }}" class="user">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico..." required autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Enviar enlace</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{url('register')}}">¡Crear una cuenta!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('login')}}">¿Ya tienes una cuenta? ¡Inicia sesión!</a>
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

</body>

</html>