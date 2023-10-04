@extends('Layouts.app')

@section('header')
    <h1>Tutor / Tutorados Asignados</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="callout callout-info">
                <h3><Strong>Tutor: </Strong> {{ $tutor->apell }} {{ $tutor->name }}</h3>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h4 class="mb-0"><strong>Asignar nuevos tutorados</strong></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tutoraddest') }}" method="POST">

                        @csrf

                        <div class="row hidden" hidden>
                            <input type="text" hidden class="hidden" value="{{ $tutor->dni }}" name="tutor">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Seleccione el nombre de los estudiantes que desea asignar al tutor</label>
                                    <div class="select2-info">
                                        <select class="select2 select2-hidden-accessible estudiantes" multiple="multiple"
                                            name="est_list[]" data-placeholder="Estudiantes sin asignar..."
                                            data-dropdown-css-class="select2-info" style="width: 100%;" data-select2-id="15"
                                            tabindex="-1" aria-hidden="true">
                                            {{-- <option data-select2-id="57">Alabama</option> --}}
                                            @foreach ($estudiantes as $est)
                                                <option value="{{ $est->dni }}">{{ $est->dni }} -
                                                    {{ $est->apell }}
                                                    {{ $est->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check-circle"></i> Asignar
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-12">
            @livewire('admin.estudiantes.estlist', ['tutor' => $tutor])
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.estudiantes').select2();
        });
    </script>

    @if (session('estAgregados'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Tutorados asignados",
                msg: '{{ session('estAgregados') }}'
            });
        </script>
    @endif

    @if ($errors->has('est_list'))
        <script>
            Lobibox.notify('error', {
                width: 400,
                img: "{{ asset('imgs/error.png') }}",
                position: 'top right',
                title: "¡Error de asignado!",
                msg: 'Por favor seleccione los estudiantes que desea asignar'
            });
        </script>
    @endif
@endpush
