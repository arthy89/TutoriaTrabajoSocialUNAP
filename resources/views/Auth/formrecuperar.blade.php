<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reestablecer Contraseña | Tutoría Trabajo Social</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
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
            {{-- form contraseña nueva --}}
            <form action="{{ route('resetcontra') }}" method="POST">

                @csrf

                <div class="card-body">

                    <small class="">
                        <ul>
                            <li>
                                Su contraseña deberá tener como mínimo 6 dígitos.
                            </li>
                            <li>
                                Solo se admiten letras y números.
                            </li>
                        </ul>
                    </small>

                    <div class="row">
                        <input type="hidden" class="form-control" value="{{ $token }}" name="token" hidden>
                        <div class="col-12">
                            <label for="nueva">Contraseña nueva <code>*</code></label>
                            <div class="input-group mb-3">
                                <input type="password" name="nueva" class="form-control"
                                    placeholder="Contraseña nueva..." id="nueva"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-eye" id="ojonew"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password">Confirmar nueva contraseña <code>*</code></label>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Repita la nueva contraseña..." id="password"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-eye" id="ojoconfirm"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <p class="text-danger mb-0 font-weight-bold">
                                <span id="text-act-error"></span>
                            </p>
                            <p class="text-danger mb-0 font-weight-bold">
                                <span id="text-digit"></span>
                            </p>
                            <p class="text-danger mb-0 font-weight-bold">
                                <span id="text-noequal"></span>
                            </p>
                            <p class="text-success mb-0 font-weight-bold">
                                <span id="text-correct"></span>
                            </p>
                        </div>
                    </div>


                </div>

                <div class="card-footer clearfix">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary" id="boton" disabled>
                            Reestablecer contraseña
                        </button>
                    </div>
                </div>
            </form>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
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

    {{-- icono para mostrar contraseñas --}}
    <script>
        var ojonew = document.getElementById('ojonew');
        var nueva = document.getElementById('nueva');

        ojonew.addEventListener("click", function() {
            if (nueva.type == "password") {
                nueva.type = "text";
                ojonew.classList.remove("fa-eye");
                ojonew.classList.add("fa-eye-slash");
            } else {
                nueva.type = "password";
                ojonew.classList.remove("fa-eye-slash");
                ojonew.classList.add("fa-eye");
            }
        })

        var ojoconfirm = document.getElementById('ojoconfirm');
        var password = document.getElementById('password');

        ojoconfirm.addEventListener("click", function() {
            if (password.type == "password") {
                password.type = "text";
                ojoconfirm.classList.remove("fa-eye");
                ojoconfirm.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                ojoconfirm.classList.remove("fa-eye-slash");
                ojoconfirm.classList.add("fa-eye");
            }
        })
    </script>

    {{-- script contrasenas comparaciones y mensajes --}}
    <script>
        $(document).ready(() => {


            var pass1 = $('#nueva');
            var pass2 = $('#password');

            function comparar() {

                var contra1 = pass1.val();
                var contra2 = pass2.val();

                var len = $('#text-digit');
                var noequal = $('#text-noequal');
                var correct = $('#text-correct');
                var boton = $('#boton');



                if (contra1.length < 6 || contra1 == "") {
                    noequal.hide();
                    correct.hide();
                    boton.prop("disabled", true);
                    len.show();
                    len.text("La contraseña debe tener 6 caracteres o más");
                }

                if (contra1.length >= 6) {
                    len.hide();
                }

                if (contra1 != contra2) {
                    boton.prop("disabled", true);
                    correct.hide();
                    noequal.show();
                    noequal.text("Las contraseñas no son iguales");
                }

                if (contra1 == contra2 && contra1.length >= 6 && contra2.length >= 6) {
                    boton.prop("disabled", false);
                    noequal.hide();
                    correct.show();
                    correct.text("Contraseña nueva correctamente ingresada");
                }
            }



            pass1.keyup(function() {
                comparar();
            });

            pass2.keyup(function() {
                comparar();
            });
        });
    </script>

    @if ($errors->has('nueva') || $errors->has('password'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error de Contraseña!",
                msg: 'Digite la contraseña de acuerdo a las indicaciones'
            });
        </script>
    @endif
</body>

</html>
