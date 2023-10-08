@extends('Layouts.app')

@push('css')
    <style>
        .borderless td,
        .borderless th {
            border: none;
        }
    </style>
@endpush

@section('header')
    <h1>Seguimientos</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="callout callout-info">
                <h4 class="mb-0"><Strong>Estudiante: </Strong> {{ $est->apell }} {{ $est->name }}</h4>
            </div>
        </div>
    </div>

    @livewire('tutor.seguimientoslist', ['est' => $est])

    {{-- !Modales crear/ver/edit --}}
    @livewire('tutor.seguimientocrear', ['est' => $est])
@endsection

@push('js')
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('seguimientoCreado', function() {
                Lobibox.notify('success', {
                    width: 400,
                    img: "{{ asset('imgs/success.png') }}",
                    position: 'top right',
                    title: "Seguimiento creado",
                    msg: 'El seguimiento fue registrado correctamente'
                });
            });
        });
    </script>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('seguimientoActualizado', function() {
                Lobibox.notify('info', {
                    width: 400,
                    img: "{{ asset('imgs/success.png') }}",
                    position: 'top right',
                    title: "Seguimiento actualizado",
                    msg: 'El seguimiento fue actualizado correctamente'
                });
            });
        });
    </script>
@endpush
