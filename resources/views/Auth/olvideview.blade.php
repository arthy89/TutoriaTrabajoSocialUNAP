<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar Contraseña | Tutoría Trabajo Social</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Notificaciones Lobibox -->
    <link rel="stylesheet" href="{{ asset('assets/notify/css/Lobibox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/notify/css/notifications.css') }}">

    <style>
        .ojo_d {
            background-color: white;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b><i class="fas fa-users"></i> Tutoría</b> Trabajo Social</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">
                    Ingrese el <b>correo</b> que registró en su perfil, ahí es donde se enviará el correo con las
                    instrucciones
                    de recuperación de su contraseña.
                </p>

                <form action="{{ route('enviarcorreo') }}" method="POST">

                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="dni" class="form-control" placeholder="Código de estudiante/DNI"
                            value="{{ old('dni') }}" onkeypress="validate(event)" required inputmode="numeric"
                            maxlength="8">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" required class="form-control" placeholder="Correo"
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Enviar el correo</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>

            <div class="card-footer text-center">
                {{-- <p class="mb-0 mt-1 text-secondary text-sm"> --}}
                <a href="{{ route('login') }}">Iniciar Sesión</a>
                {{-- </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- Notificaciones Lobibox -->
    <script src="{{ asset('assets/notify/js/Lobibox.js') }}"></script>
    <script src="{{ asset('assets/notify/js/notification-active.js') }}"></script>

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>

    @error('dni')
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "Ingrese su Código o DNI",
                msg: 'El campo DNI es obligatorio'
            });
        </script>
    @enderror

    @error('email')
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "Ingrese su Correo",
                msg: 'El correo es necesario'
            });
        </script>
    @enderror

    @error('dni_email')
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "Error de Código/DNI y Correo",
                msg: 'Es posible que el Código/DNI no esté registrado o el correo no le corresponda'
            });
        </script>
    @enderror
</body>

</html>
