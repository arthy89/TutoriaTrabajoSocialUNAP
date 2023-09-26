@extends('Layouts.app')

@section('header')
    <h1>Página de Inicio</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h3 class>Bienvenido al sistema de Tutoría de Trabajo Social</h3>
                    <p class="card-text">
                        Puede desplazarse a través de la barra de navegación de la izquierda.
                        Los comunicados y algunas noticias se verán en esta sección.
                    </p>
                </div>
            </div><!-- /.card -->
        </div>
    </div>
@endsection

@push('js')
    @if (session('status'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Acceso Correcto",
                msg: '{{ session('status') }}'
            });
        </script>
    @endif
@endpush
