<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Correo Enviado | Tutoría Trabajo Social</title>

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
                    El correo se envió correctamente a <b>{{ $email }}</b>, por favor revise si es necesario en
                    "Spam".
                </p>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-block">Iniciar Sesión</a>
                </div>
                <!-- /.col -->
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
</body>

</html>
