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
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 bg-register-image d-flex justify-content-center align-items-center">
                        <img src="{{ asset('icon/icon.png') }}" alt="Logo" style="max-width: 70%; height: auto;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crear una cuenta!</h1>
                            </div>
                            <form class="user">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="name" name="name" value="{{ old('name') }}" placeholder="Nombres" required autofocus autocomplete="name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Apellidos" required autocomplete="lastname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="number" class="form-control form-control-user" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Teléfono" required autocomplete="phone">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="address" name="address" value="{{ old('address') }}" placeholder="Dirección" required autocomplete="address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" value="{{ old('email') }}" placeholder="Correo electrónico" required autocomplete="username">
                                        @if ($errors->has('email'))
                                            <span class="text-danger small">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Contraseña" required autocomplete="new-password">
                                            @if ($errors->has('password'))
                                                <span class="text-danger small">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required autocomplete="new-password">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="text-danger small">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Registrarse</button>
                                </form>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
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