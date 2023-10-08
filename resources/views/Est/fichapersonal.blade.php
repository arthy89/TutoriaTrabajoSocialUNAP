@extends('Layouts.app')

@section('header')
    <h1>Ficha personal del estudiante</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-body">

                    <h3><b>Datos generales</b></h3>

                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>DNI</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->dni }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>APELLIDOS</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->apell }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>NOMBRES</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>SEXO</label>
                                <input type="text" class="form-control" value="{{ strtoupper(Auth::user()->sexo) }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>CORREO</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>CELULAR</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->celular }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('fichact') }}" method="POST">

                @csrf
                @method('put')

                <div class="card card-primary card-outline">
                    <div class="card-body">

                        <h2><b>Ficha Personal</b></h2>

                        <h3><b>Datos</b></h3>

                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>SEMESTRE <code>*</code></label>
                                    <select class="custom-select form-control-border">
                                        <option>(SELECCIONE)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label for="fecha_nacimiento">FECHA DE NACIMIENTO <code>*</code></label>
                                    <input type="date" class="form-control form-control-border" id="fecha_nacimiento"
                                        {{-- name="fecha_nacimiento" --}}>
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>DEPARTAMENTO <code>*</code></label>
                                    <select class="custom-select form-control-border">
                                        <option>(SELECCIONE)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>PROVINCIA <code>*</code></label>
                                    <select class="custom-select form-control-border">
                                        <option>(SELECCIONE)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-2">
                                <div class="form-group">
                                    <label>DISTRITO <code>*</code></label>
                                    <select class="custom-select form-control-border">
                                        <option>(SELECCIONE)</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- <hr> --}}

                        <h3><b>Problemas identificados en el estudiante</b></h3>

                        <h4>Académica</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0 rounded-lg">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">
                                                        A.1 Dificultades para asistir puntualmente
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.1">
                                                            <label for="a.1"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        A.6 Conflictos con algún docente
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.6">
                                                            <label for="a.6"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        A.2 Reprobación de exámenes parciales
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.2">
                                                            <label for="a.2"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        A.7 Habilidades y capacidades de aprender
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.7">
                                                            <label for="a.7"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        A.3 Dificultades para trabajar en grupo
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.3">
                                                            <label for="a.3"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        A.8 Técnicas y hábitos de estudio
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.8">
                                                            <label for="a.8"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        A.4 Dificultades para exponer
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.4">
                                                            <label for="a.4"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        A.9 Vocación e identificación de la carrera
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.9">
                                                            <label for="a.9"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        A.5 Dificultades para realizar y presentar trabajos
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.5">
                                                            <label for="a.5"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        A.10 Interés y motivación para estudiar
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.10">
                                                            <label for="a.10"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle" colspan="2">

                                                    </td>
                                                    <td class="align-middle">
                                                        A.11 Riesgo académico
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="a.11">
                                                            <label for="a.11"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>Personal</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0 rounded-lg">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">
                                                        P.1 Salud y estado físico
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.1">
                                                            <label for="p.1"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        P.8 Seguridad Personal / emocional
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.8">
                                                            <label for="p.8"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        P.2 Alimentación
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.2">
                                                            <label for="p.2"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        P.9 Se siente discriminado (a), marginado
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.9">
                                                            <label for="p.9"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        P.3 Vivienda
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.3">
                                                            <label for="p.3"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        P.10 Problemas con sus creencias, religión
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.10">
                                                            <label for="p.10"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        P.4 Autonomía y toma de decisiones
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.4">
                                                            <label for="p.4"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        P.11 Vocación e identificación de la carrera
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.11">
                                                            <label for="p.11"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        P.5 Conflictos en las relaciones con sus compañeros
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.5">
                                                            <label for="p.5"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle" rowspan="2">
                                                        P.12 Limitaciones para establecer metas y aspiraciones personales
                                                        (proyecto de vida)
                                                    </td>
                                                    <td class="text-center align-middle" rowspan="2">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.12">
                                                            <label for="p.12"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        P.6 Dificultades para integrarse al grupo
                                                    </td>
                                                    <td class="text-center align-middle" style="padding-right: 0.75rem;">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.6">
                                                            <label for="p.6"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        P.7 Se siente estresado continuamente
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.7">
                                                            <label for="p.7"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        P.13 Autoestima
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="p.13">
                                                            <label for="p.13"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        P.14 Otros:
                                                    </td>
                                                    <td class="text-center align-middle" colspan="3">
                                                        <input type="text" class="form-control form-control-border">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>Familiar</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0 rounded-lg">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle">
                                                        F.1 Conflicto en su relación con un familiar
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.1">
                                                            <label for="f.1"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        F.5 Tiene familiares que dependen del estudiante
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.5">
                                                            <label for="f.5"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        F.2 Vive solo y le afecta
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.2">
                                                            <label for="f.2"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        F.6 Tiene familiares que dependen del estudiante
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.6">
                                                            <label for="f.6"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        F.3 No cuenta con el soporte económico familiar para continuar sus
                                                        estudios
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.3">
                                                            <label for="f.3"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        F.7 Tiene hijos y dificultades para afrontar sus responsabilidades
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.7">
                                                            <label for="f.7"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        F.4 Tiene un familiar enfermo
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.4">
                                                            <label for="f.4"></label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        F.8 Ha sufrido la pérdida de un familiar cercano
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="f.8">
                                                            <label for="f.8"></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">
                                                        F.9 Otros:
                                                    </td>
                                                    <td class="text-center align-middle" colspan="3">
                                                        <input type="text" class="form-control form-control-border">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3><b>Familiares</b></h3>
                        @error('familia')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="row mx-1">
                            <button type="button" class="btn bg-gradient-primary shadow" onclick="agregarFamiliar()">
                                <i class="fa fa-user-plus"></i>
                                Agregar familiar
                            </button>
                        </div>

                        <div class="row">
                            <input type="hidden" name="familia" id="familiaInput" hidden>
                            <div class="col-12 mt-3">
                                <div class="card">
                                    <div class="card-body table-responsive p-0 rounded-lg ">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th style="width: 300px" class="align-middle">
                                                        <div class="mx-auto" style="width: 300px;">
                                                            Apellidos y Nombres
                                                        </div>
                                                    </th>
                                                    <th style="width: 100px" class="align-middle">
                                                        <div class="mx-auto" style="width: 100px;">
                                                            Familiar
                                                        </div>
                                                    </th>
                                                    <th style="width: 100px" class="align-middle">
                                                        <div class="mx-auto" style="width: 90px;">
                                                            Idioma
                                                        </div>
                                                    </th>
                                                    <th style="width: 250px" class="align-middle">
                                                        <div class="mx-auto" style="width: 250px;">
                                                            Residencia
                                                        </div>
                                                    </th>
                                                    <th style="width: 200px" class="align-middle">
                                                        <div class="mx-auto" style="width: 200px;">
                                                            Dirección
                                                        </div>
                                                    </th>
                                                    <th style="width: 100px" class="align-middle">
                                                        <div class="mx-auto" style="width: 180px;">
                                                            Celular
                                                        </div>
                                                    </th>
                                                    <th style="width: 80px" class="align-middle">
                                                        <div class="mx-auto" style="width: 90px;">
                                                            Estado
                                                        </div>
                                                    </th>
                                                    <th style="width: 30px" class="align-middle">
                                                        Quitar
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="tablebody">
                                                @if ($ficha_act)
                                                    @if ($ficha_act->familia)
                                                        @foreach (json_decode($ficha_act->familia) as $item)
                                                            <tr>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-border text-uppercase nombre-input"
                                                                        value="{{ $item->nombre }}"
                                                                        data-id="{{ $item->id }}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control parentesco-input"
                                                                        data-id="{{ $item->id }}">
                                                                        <option value="" hidden>(Seleccione)</option>
                                                                        <option value="1"
                                                                            {{ $item->parentesco == '1' ? 'selected' : '' }}>
                                                                            Padre</option>
                                                                        <option value="2"
                                                                            {{ $item->parentesco == '2' ? 'selected' : '' }}>
                                                                            Madre</option>
                                                                        <option value="3"
                                                                            {{ $item->parentesco == '3' ? 'selected' : '' }}>
                                                                            Abuelo(a)</option>
                                                                        <option value="4"
                                                                            {{ $item->parentesco == '4' ? 'selected' : '' }}>
                                                                            Hermano(a)</option>
                                                                        <option value="5"
                                                                            {{ $item->parentesco == '5' ? 'selected' : '' }}>
                                                                            Cónyuge</option>
                                                                        <option value="6"
                                                                            {{ $item->parentesco == '6' ? 'selected' : '' }}>
                                                                            Hijo(a)</option>
                                                                        <option value="7"
                                                                            {{ $item->parentesco == '7' ? 'selected' : '' }}>
                                                                            Tío(a)</option>
                                                                        <option value="8"
                                                                            {{ $item->parentesco == '8' ? 'selected' : '' }}>
                                                                            Primo(a)</option>
                                                                        <option value="9"
                                                                            {{ $item->parentesco == '9' ? 'selected' : '' }}>
                                                                            Sobrino(a)</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control idioma-input"
                                                                        data-id="{{ $item->id }}">
                                                                        <option value="" hidden>(Seleccione)</option>
                                                                        <option value="1"
                                                                            {{ $item->idioma == '1' ? 'selected' : '' }}>
                                                                            Español</option>
                                                                        <option value="2"
                                                                            {{ $item->idioma == '2' ? 'selected' : '' }}>
                                                                            Quechua</option>
                                                                        <option value="3"
                                                                            {{ $item->idioma == '3' ? 'selected' : '' }}>
                                                                            Aymara
                                                                        </option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-border residencia-input text-uppercase"
                                                                        type="text" placeholder="Dep-Prov-Ciu"
                                                                        value="{{ $item->residencia }}"
                                                                        data-id="{{ $item->id }}">
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        class="form-control form-control-border direccion-input text-uppercase"
                                                                        type="text" placeholder="Dir. de domicilio"
                                                                        value="{{ $item->direccion }}"
                                                                        data-id="{{ $item->id }}">
                                                                </td>
                                                                <td>
                                                                    <input type="text"
                                                                        class="form-control form-control-border celular-input"
                                                                        onkeypress="validate()" inputmode="numeric"
                                                                        maxlength="9" value="{{ $item->celular }}"
                                                                        data-id="{{ $item->id }}">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control estado-input"
                                                                        data-id="{{ $item->id }}">
                                                                        <option value="" hidden>(Seleccione)</option>
                                                                        <option value="1"
                                                                            {{ $item->estado == '1' ? 'selected' : '' }}>
                                                                            Vivo
                                                                        </option>
                                                                        <option value="2"
                                                                            {{ $item->estado == '2' ? 'selected' : '' }}>
                                                                            Fallecido</option>
                                                                    </select>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button"
                                                                        class="btn bg-gradient-danger btn-sm"
                                                                        onclick="eliminarFamiliar(this)">
                                                                        <i class="fas fa-times-circle"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        <div class="row justify-content-center">
                            <button type="submit" class="btn bg-gradient-primary shadow">
                                <i class="fas fa-id-card"></i>
                                Guardar Ficha Personal
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('js')
    <script>
        var listaFamilia = []; //array de familiares
        var contador = 1; //contador para el id
        var max_id = 1;

        // if para evitar errores por si no existe ninguna ficha
        @if ($ficha_act)
            //guardamos la lista de familiares guardados anteriormente
            var listaActFamilia = JSON.parse('{!! addslashes($ficha_act->familia) !!}');



            // buscamos el mayor id de familia
            listaActFamilia.forEach(function(item) {
                if (item.id > contador) {
                    max_id = item.id;
                }
            });

            contador = max_id + 1; //sumamos +1 al maximo id y asignamos al contador

            // Recorrer la lista de familares actuales y agregamos a "listaFamilia"
            listaActFamilia.forEach(function(item) {
                var elemento = {
                    id: item.id,
                    nombre: item.nombre,
                    parentesco: item.parentesco,
                    idioma: item.idioma,
                    residencia: item.residencia,
                    direccion: item.direccion,
                    celular: item.celular,
                    estado: item.estado
                };

                // actualizar 'nombre' OTRA MANERA DE HACERLO PASO POR PASO
                // $('.tablebody').on('blur', '.nombre-input', function() {
                //     var _nombre_ = $(this).val();
                //     var id = $(this).data('id');

                //     // buscar el elemento en 'listaFamilia' para actualizar el campo 'nombre'
                //     listaFamilia.forEach(function(elemento) {
                //         if (elemento.id === id) {
                //             elemento.nombre = _nombre_;
                //             return false; // termina de iterar entre la lista 'listaFamilia'
                //         }
                //     });

                //     actualizarFormInput();
                //     console.log(listaFamilia);
                // });
                // actualizar 'nombre'

                // FORMA CORTA DE ACTUALIZAR
                // nombre
                var actualizarNombre = function() {
                    // asignamos el valor del input actual al array con el elemento correspondiente
                    var _nombre_ = $(this).val();
                    elemento.nombre = _nombre_;
                    actualizarFormInput();
                    console.log(listaFamilia);
                };

                // familiar
                var actualizarFamiliar = function() {
                    if ($(this).val() !== "") {
                        var _parentesco_ = $(this).val();
                        elemento.parentesco = _parentesco_;
                        actualizarFormInput();
                        console.log(listaFamilia);
                    }
                };

                // idioma
                var actualizarIdioma = function() {
                    if ($(this).val() !== "") {
                        var _idioma_ = $(this).val();
                        elemento.idioma = _idioma_;
                        actualizarFormInput();
                        console.log(listaFamilia);
                    }
                };

                // residencia
                var actualizarResidencia = function() {
                    if ($(this).val() !== "") {
                        var _residencia_ = $(this).val();
                        elemento.residencia = _residencia_;
                        actualizarFormInput();
                        console.log(listaFamilia);
                    }
                };

                // direccion
                var actualizarDireccion = function() {
                    if ($(this).val() !== "") {
                        var _direccion_ = $(this).val();
                        elemento.direccion = _direccion_;
                        actualizarFormInput();
                        console.log(listaFamilia);
                    }
                };

                // celular
                var actualizarCelular = function() {
                    var _celular_ = $(this).val();
                    elemento.celular = _celular_;
                    actualizarFormInput();
                    console.log(listaFamilia);
                };

                // estado
                var actualizarEstado = function() {
                    if ($(this).val() !== "") {
                        var _estado_ = $(this).val();
                        elemento.estado = _estado_;
                        actualizarFormInput();
                        console.log(listaFamilia);
                    }
                };

                // evento blur en el input clase nombre-input con el data correspondiente al id del elemento
                $('.nombre-input[data-id="' + elemento.id + '"]').on('blur', actualizarNombre);
                $('.parentesco-input[data-id="' + elemento.id + '"]').on('change', actualizarFamiliar);
                $('.idioma-input[data-id="' + elemento.id + '"]').on('change', actualizarIdioma);
                $('.residencia-input[data-id="' + elemento.id + '"]').on('change', actualizarResidencia);
                $('.direccion-input[data-id="' + elemento.id + '"]').on('change', actualizarDireccion);
                $('.celular-input[data-id="' + elemento.id + '"]').on('blur', actualizarCelular);
                $('.estado-input[data-id="' + elemento.id + '"]').on('change', actualizarEstado);


                // listamos el array incial con los elementos añadidos al 'listaFamilia' y actualizamos el input
                listaFamilia.push(elemento);
                actualizarFormInput();
            });


            // verificamos que el array se cargo correctamente si existe
            console.log(listaFamilia);
        @endif

        function agregarFamiliar() {
            // creamos el html para insertarlo en la tabla visual
            var familiarHtml =
                `
                    <tr>
                        <td>
                            <input type="text"
                                class="form-control form-control-border text-uppercase nombre-input">
                        </td>
                        <td>
                            <select class="form-control parentesco-input">
                                <option value="" hidden>(Seleccione)</option>
                                <option value="1">Padre</option>
                                <option value="2">Madre</option>
                                <option value="3">Abuelo(a)</option>
                                <option value="4">Hermano(a)</option>
                                <option value="5">Cónyuge</option>
                                <option value="6">Hijo(a)</option>
                                <option value="7">Tío(a)</option>
                                <option value="8">Primo(a)</option>
                                <option value="9">Sobrino(a)</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control idioma-input">
                                <option value="" hidden>(Seleccione)</option>
                                <option value="1">Español</option>
                                <option value="2">Quechua</option>
                                <option value="3">Aymara</option>
                            </select>
                        </td>
                        <td>
                            <input class="form-control form-control-border residencia-input text-uppercase"
                                type="text" placeholder="Dep-Prov-Ciu">
                        </td>
                        <td>
                            <input class="form-control form-control-border direccion-input text-uppercase" type="text" placeholder="Dir. de domicilio">
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-border celular-input" onkeypress="validate()" inputmode="numeric" maxlength="9">
                        </td>
                        <td>
                            <select class="form-control estado-input">
                                <option value="" hidden>(Seleccione)</option>
                                <option value="1">Vivo</option>
                                <option value="2">Fallecido</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn bg-gradient-danger btn-sm" onclick="eliminarFamiliar(this)">
                                <i class="fas fa-times-circle"></i>
                            </button>
                        </td>
                    </tr>
                `;

            // se agrega a la tabla visual de clase 'tablebody'
            $('.tablebody').append(familiarHtml);

            // creamos y agregamos elementos al array 'listaFamilia' - primero vacio porque se require el llenado por el usuario
            var familiar = {
                id: contador++,
                nombre: '',
                parentesco: '',
                idioma: '',
                residencia: '',
                direccion: '',
                celular: '',
                estado: ''
            };

            listaFamilia.push(familiar);
            actualizarFormInput();
            console.log(listaFamilia);

            // Actualizar los valores del array 'listaFamilia' segun corresponda

            // nombre
            $('.tablebody tr:last-child .nombre-input').on('blur', function() {
                var _nombre = $(this).val();
                familiar.nombre = _nombre;
                actualizarFormInput();
                console.log(listaFamilia);
            });

            // parentesco
            $('.tablebody tr:last-child .parentesco-input').change(function() {
                if ($(this).val() !== "") {
                    var _parentesco = $(this).val();
                    familiar.parentesco = _parentesco;
                    actualizarFormInput();
                    console.log(listaFamilia);
                }
            });

            // idioma
            $('.tablebody tr:last-child .idioma-input').change(function() {
                if ($(this).val() !== "") {
                    var _idioma = $(this).val();
                    familiar.idioma = _idioma;
                    actualizarFormInput();
                    console.log(listaFamilia);
                }
            });

            // residencia
            $('.tablebody tr:last-child .residencia-input').change(function() {
                if ($(this).val() !== "") {
                    var _residencia = $(this).val();
                    familiar.residencia = _residencia;
                    actualizarFormInput();
                    console.log(listaFamilia);
                }
            });

            // direccion
            $('.tablebody tr:last-child .direccion-input').change(function() {
                if ($(this).val() !== "") {
                    var _direccion = $(this).val();
                    familiar.direccion = _direccion;
                    actualizarFormInput();
                    console.log(listaFamilia);
                }
            });

            // celular
            $('.tablebody tr:last-child .celular-input').on('blur', function() {
                var _celular = $(this).val();
                familiar.celular = _celular;
                actualizarFormInput();
                console.log(listaFamilia);
            });

            // estado
            $('.tablebody tr:last-child .estado-input').change(function() {
                if ($(this).val() !== "") {
                    var _estado = $(this).val();
                    familiar.estado = _estado;
                    actualizarFormInput();
                    console.log(listaFamilia);
                }
            });
        }

        function eliminarFamiliar(btn) {
            var tr = $(btn).closest('tr');

            // obtener el indice del elemento a eliminar
            var index = $(btn).closest('tr').index();

            // eliminar el elemento del array
            listaFamilia.splice(index, 1);

            tr.remove();
            actualizarFormInput();
            console.log(listaFamilia);
        }

        function actualizarFormInput() {
            // logica para actualizar el input que sera mandado por el form
            $('#familiaInput').val(JSON.stringify(listaFamilia));
        }
    </script>

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

    @if (session('fichaActualizada'))
        <script>
            Lobibox.notify('success', {
                width: 400,
                img: "{{ asset('imgs/success.png') }}",
                position: 'top right',
                title: "Ficha Actualizada",
                msg: '{{ session('fichaActualizada') }}'
            });
        </script>
    @endif
@endpush
