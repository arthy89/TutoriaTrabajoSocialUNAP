<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Tutoría Trabajo Social</title>

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
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b><i class="fas fa-users"></i> Tutoría</b> Trabajo Social</a>
            </div>
            <div class="card-body">

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Código de estudiante/DNI" name="dni"
                            onkeypress="validate(event)" required inputmode="numeric" maxlength="8">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="contra" required class="form-control" placeholder="Contraseña"
                            name="password">
                        <div class="input-group-append">
                            <div class="input-group-text" style="background-color: white;">
                                <span class="fas fa-eye" id="ojo"></span>
                            </div>
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Recuérdame
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <p class="mb-0 mt-1 text-secondary text-sm">
                    Si olvidó su contraseña, contactar al Coordinador
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
        var ojo_ico = document.getElementById('ojo');
        var input = document.getElementById('contra');

        ojo_ico.addEventListener("click", function() {
            if (input.type == "password") {
                input.type = "text";
                ojo_ico.classList.remove("fa-eye");
                ojo_ico.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                ojo_ico.classList.remove("fa-eye-slash");
                ojo_ico.classList.add("fa-eye");
            }
        })
    </script>

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

    @if (session('status'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Cierre de sesión correcto",
                msg: '{{ session('status') }} Vuelva pronto'
            });
        </script>
    @endif

    @if (session('deshabilitado'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error de sesión!",
                msg: '{{ session('deshabilitado') }}'
            });
        </script>
    @endif

    @if ($errors->has('dni'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "Error de sesión",
                msg: '¡Error de inicio de sesión, credenciales incorrectas!'
            });
        </script>
    @endif
</body>

</html>
