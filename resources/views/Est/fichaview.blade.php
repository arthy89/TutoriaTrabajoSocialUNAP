@extends('Layouts.app')

@section('header')
    <h1>Ficha del Estudiante</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($est->foto)
                            <div class="circle-mask" style="width: 90px; height:90px">
                                <img class="img-circle img-bordered-sm" src="{{ asset('storage/' . $est->foto) }}"
                                    alt="Foto de perfil">
                            </div>
                        @else
                            <div class="circle-mask" style="width: 90px; height:90px">
                                <img class="img-circle img-bordered-sm" src="{{ asset('imgs/user-default.jpg') }}"
                                    alt="Foto de perfil">
                            </div>
                        @endif
                    </div>

                    <h3 class="profile-username text-center mb-0">{{ $est->apell }}</h3>
                    <h3 class="profile-username text-center mt-0">{{ $est->name }}</h3>

                    <p class="text-muted text-center">Tutorado</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Código</b> <span class="float-right">{{ $est->dni }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Sexo</b> <span class="float-right">{{ Str::upper($est->sexo) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Correo</b> <span class="float-right">{{ $est->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Celular</b> <span class="float-right">{{ $est->celular }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Seguimientos</b> <span class="float-right">{{ $est->seguimientos->count() }}</span>
                        </li>
                    </ul>

                    <a href="{{ route('seguimientos', $est->dni) }}" class="btn btn-primary btn-block">
                        <b>
                            <i class="fas fa-file-invoice"></i> Ver seguimientos
                        </b>
                    </a>

                    <a href="{{ route('fichaestprint', $est->dni) }}" class="btn btn-default btn-block" target="_blank">
                        <b>
                            <i class="fas fa-print"></i> Imprimir Ficha
                        </b>
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h2><b>Ficha personal</b></h2>

                    <h3><b>Datos personales</b></h3>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Código</label>
                                <input type="text" class="form-control" value="{{ $est->dni }}" disabled="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" value="{{ $est->apell }}" disabled="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control" value="{{ $est->name }}" disabled="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sexo</label>
                                <input type="text" class="form-control" value="{{ Str::upper($est->sexo) }}"
                                    disabled="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Semestre</label>
                                <input type="text" class="form-control" value="{{ 'semestre' }}" disabled="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="text" class="form-control" value="{{ $est->email }}" disabled="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Celular</label>
                                <input type="text" class="form-control" value="{{ $est->celular }}" disabled="">
                            </div>
                        </div>
                    </div>

                    <h3><b>Residencia</b></h3>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Departamento</label>
                                <input type="text" class="form-control" value="{{ '' }}" disabled="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Provincia</label>
                                <input type="text" class="form-control" value="{{ '' }}" disabled="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Distrito</label>
                                <input type="text" class="form-control" value="{{ '' }}" disabled="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" class="form-control" value="{{ '' }}" disabled="">
                            </div>
                        </div>
                    </div>

                    <h3><b>Familiares</b></h3>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0 rounded-lg">
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
                                            </tr>
                                        </thead>
                                        <tbody class="tablebody">
                                            @foreach (json_decode($est->ficha->first()->familia) as $item)
                                                <tr>
                                                    <td class="align-middle">
                                                        {{ Str::upper($item->nombre) }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($item->parentesco == '1')
                                                            Padre
                                                        @elseif($item->parentesco == '2')
                                                            Madre
                                                        @elseif($item->parentesco == '3')
                                                            Abuelo(a)
                                                        @elseif($item->parentesco == '4')
                                                            Hermano(a)
                                                        @elseif($item->parentesco == '5')
                                                            Cónyuge
                                                        @elseif($item->parentesco == '6')
                                                            Hijo(a)
                                                        @elseif($item->parentesco == '7')
                                                            Tío(a)
                                                        @elseif($item->parentesco == '8')
                                                            Primo(a)
                                                        @elseif($item->parentesco == '9')
                                                            Sobrino(a)
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($item->idioma == '1')
                                                            Español
                                                        @elseif($item->idioma == '2')
                                                            Quechua
                                                        @elseif($item->idioma == '3')
                                                            Aymara
                                                        @endif

                                                    </td>
                                                    <td class="align-middle">
                                                        {{ Str::upper($item->residencia) }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ Str::upper($item->direccion) }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $item->celular }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($item->estado == '1')
                                                            Vivo
                                                        @else
                                                            Fallecido
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
