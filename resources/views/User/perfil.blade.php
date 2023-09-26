@extends('Layouts.app')

@section('header')
    <h1>Edición del Perfil Personal</h1>
@endsection

@push('css')
    <style>
        .main-container_1 {
            width: 100%;
            margin-bottom: 15px;
            margin-top: 1%;
            text-align: center;
        }

        .input-container_1 {
            text-align: center;
            margin: 10px auto;
            padding: 10px;
            overflow: hidden;
            position: relative;
            color: rgb(16, 4, 4);
            cursor: pointer;
            border: 2px dashed rgb(172, 170, 170);
            border-radius: 20px;
            display: inline-block;
        }

        .input-container_1 [type=file] {
            cursor: inherit;
            display: block;
            font-size: 999px;
            filter: alpha(opacity=0);
            min-height: 100%;
            min-width: 100%;
            opacity: 0;
            position: absolute;
            right: 0;
            text-align: right;
            top: 0;
        }

        .preview-container {
            margin: 0 auto;
            width: 200px;
            min-height: 200px;
            background-color: white;
            border: 2px dashed rgb(66, 137, 212);
            padding: 10px;
            border-radius: 4px;
        }

        .preview-container>img {
            margin: 10;
            width: 100%;
        }

        .tokenizationSelect2 {
            width: 300px;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        {{-- Form para actualizar datos personales --}}
        <div class="col-12 col-md-6">
            <form action="{{ route('perfilact', Auth::user()->id) }}" method="POST">

                @csrf
                @method('put')

                <div class="card card-primary card-outline">
                    <div class="card-body">

                        <h3>Datos Generales</h3>

                        <div class="row">
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control" id="dni" disabled
                                    value="{{ Auth::user()->dni }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="apell">Apellidos <code>*</code></label>
                                    <input type="text" class="form-control form-control-border text-uppercase"
                                        id="apell" name="apell" value="{{ old('apell', Auth::user()->apell) }}">
                                    @if ($errors->has('apell'))
                                        <small class="text-danger">Los <strong>Apellidos</strong> son requeridos</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombres <code>*</code></label>
                                    <input type="text" class="form-control form-control-border text-uppercase"
                                        id="name" name="name" value="{{ old('name', Auth::user()->name) }}">
                                    @if ($errors->has('name'))
                                        <small class="text-danger">Los <strong>Nombres</strong> son requeridos</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <h5>Sexo <code>*</code></h5>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="masculino" name="sexo" value="masculino"
                                            {{ old('sexo') == 'masculino' ? 'checked=' . '"' . 'checked' . '"' : '' }}
                                            {{ Auth::user()->sexo == 'masculino' ? 'checked' : '' }}>
                                        <label for="masculino">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" id="femenino" name="sexo" value="femenino"
                                            {{ old('sexo') == 'femenino' ? 'checked=' . '"' . 'checked' . '"' : '' }}
                                            {{ Auth::user()->sexo == 'femenino' ? 'checked' : '' }}>
                                        <label for="femenino">
                                            Femenino
                                        </label>
                                    </div>
                                    <br>
                                    @if ($errors->has('sexo'))
                                        <small class="text-danger">Este campo es requerido</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo <code>*</code></label>
                                    <input type="email" class="form-control form-control-border" id="email"
                                        name="email" placeholder="correo@example.com"
                                        value="{{ old('email', Auth::user()->email) }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="celular">Celular <code>*</code></label>
                                    <input type="text" class="form-control form-control-border" id="celular"
                                        name="celular" onkeypress="validate()" inputmode="numeric" minlength="9"
                                        maxlength="9" placeholder="Número de celular 987654321..."
                                        value="{{ old('celular', Auth::user()->celular) }}">
                                    @error('celular')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="card-footer clearfix">
                        <div class="row justify-content-center">
                            <button type="submit" class="btn bg-gradient-primary shadow">
                                <i class="fa fa-save"></i>
                                Guardar datos
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        {{-- form contraseña nueva --}}
        <div class="col-12 col-md-6">
            <form action="{{ route('perfilpass') }}" method="POST">

                @csrf
                @method('put')

                <div class="card card-danger card-outline">
                    <div class="card-body">

                        <h3>Cambiar contraseña</h3>

                        <small class="text-secondary">
                            <ul>
                                <li>
                                    Inicialmente su contraseña es su código de estudiante.
                                </li>
                                <li>
                                    Su contraseña deberá tener como mínimo 6 dígitos.
                                </li>
                                <li>
                                    Solo se admiten letras y números.
                                </li>
                            </ul>
                        </small>

                        <div class="row">

                            <div class="col-12">
                                <label for="actual">Contraseña actual <code>*</code></label>
                                <div class="input-group mb-3">
                                    <input type="password" name="actual" class="form-control"
                                        placeholder="Contraseña acutal..." id="actual"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/,'')">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-eye" id="ojoactual"></i></span>
                                    </div>
                                </div>
                            </div>

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
                            <button type="submit" class="btn bg-gradient-danger shadow" id="boton" disabled>
                                <i class="fas fa-lock"></i>
                                Guardar contraseña nueva
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        {{-- Foto de perfil --}}
        <div class="col-12 col-md-6">
            <form action="{{ route('perfilfoto') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('put')

                <div class="card card-warning card-outline">
                    <div class="card-body">

                        <h3>Foto de perfil</h3>
                        <small class="text-secondary">
                            Preferentemente suba una imagen cuadrada que tenga la misma medida de
                            alto y ancho. La foto no debe pesar más de 4MB
                        </small>

                        @error('foto')
                            <br>
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <div id="row justify-content-center">

                            <div id="imagenes">
                                <div class="main-container_1" id="main-container">
                                    <div class="input-container_1">
                                        Clic aquí para agregar una imagen
                                        <input type="file" id="archivo" name="foto" accept="image/*">
                                    </div>
                                    <div class="preview-container">
                                        @if (Auth::user()->foto)
                                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" id="preview">
                                        @else
                                            <img src="{{ asset('imgs/user-default.jpg') }}" id="preview">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer clearfix">
                        <div class="row justify-content-center">
                            <button type="submit" class="btn bg-gradient-warning shadow">
                                <i class="fas fa-image"></i>
                                Guardar la foto nueva
                            </button>
                        </div>
                    </div>

                </div>
            </form>


        </div>

    </div>
@endsection

@push('js')
    {{-- validador de numeros --}}
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

    {{-- muestra de imagen cargada --}}
    <script>
        function mostrarImagen(event) {
            var imagenSource = event.target.result;
            var previewImage = document.getElementById('preview');

            previewImage.src = imagenSource;
        }

        function procesarArchivo(event) {
            var imagen = event.target.files[0];

            var lector = new FileReader();

            lector.addEventListener('load', mostrarImagen, false);

            lector.readAsDataURL(imagen);
        }

        document.getElementById('archivo')
            .addEventListener('change', procesarArchivo, false)
    </script>

    {{-- icono para mostrar contraseñas --}}
    <script>
        var ojoactual = document.getElementById('ojoactual');
        var actual = document.getElementById('actual');

        ojoactual.addEventListener("click", function() {
            if (actual.type == "password") {
                actual.type = "text";
                ojoactual.classList.remove("fa-eye");
                ojoactual.classList.add("fa-eye-slash");
            } else {
                actual.type = "password";
                ojoactual.classList.remove("fa-eye-slash");
                ojoactual.classList.add("fa-eye");
            }
        })

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

            var pass = $('#actual');
            var pass1 = $('#nueva');
            var pass2 = $('#password');

            function comparar() {
                var contra0 = pass.val();
                var contra1 = pass1.val();
                var contra2 = pass2.val();
                var act = $('#text-act-error')
                var len = $('#text-digit');
                var noequal = $('#text-noequal');
                var correct = $('#text-correct');
                var boton = $('#boton');

                if (contra0.length < 6 || contra0 == "") {
                    act.show();
                    act.text("Ingrese su contraseña actual");
                    boton.prop("disabled", true);
                } else {
                    act.hide();
                }

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
                    if (contra0.length >= 6) {
                        boton.prop("disabled", false);
                    }
                    noequal.hide();
                    correct.show();
                    correct.text("Contraseña nueva correctamente ingresada");
                }
            }

            pass.keyup(function() {
                comparar();
            });

            pass1.keyup(function() {
                comparar();
            });

            pass2.keyup(function() {
                comparar();
            });
        });
    </script>

    @if ($errors->has('apell'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error en Apellidos!",
                msg: 'Los apellidos son requeridos'
            });
        </script>
    @endif

    @if ($errors->has('name'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error en los Nombres!",
                msg: 'Los nombres son requeridos'
            });
        </script>
    @endif

    @if ($errors->has('sexo'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error en guardar datos!",
                msg: 'Todos los campos son requeridos'
            });
        </script>
    @endif

    @if ($errors->has('email'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error en el Correo!",
                msg: 'El correo es requerido'
            });
        </script>
    @endif

    @if ($errors->has('celular'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error en el Celular!",
                msg: 'El número de celular es requerido'
            });
        </script>
    @endif

    @if (session('status'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Perfil actualizado",
                msg: '{{ session('status') }}'
            });
        </script>
    @endif

    @if (session('errorFormCorrupto'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "Fatal Error",
                msg: '{{ session('errorFormCorrupto') }}'
            });
        </script>
    @endif

    @if ($errors->has('foto'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error de Foto!",
                msg: 'Algo no anda bien con la foto, revise las indicaciones'
            });
        </script>
    @endif

    @if (session('fotoActualizada'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Foto Actualizada",
                msg: '{{ session('fotoActualizada') }}'
            });
        </script>
    @endif

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

    @if ($errors->has('actual'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error de Contraseña!",
                msg: 'Contraseña actual incorrecta'
            });
        </script>
    @endif

    @if (session('contraActualizada'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Contraseña Actualizada",
                msg: '{{ session('contraActualizada') }}'
            });
        </script>
    @endif

@endpush
