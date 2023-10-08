@extends('Layouts.app')

@section('header')
    <h1>Tutor</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($tutor->foto)
                            <div class="circle-mask" style="width: 90px; height:90px">
                                <img class="img-circle img-bordered-sm" src="{{ asset('storage/' . $tutor->foto) }}"
                                    alt="">
                            </div>
                        @else
                            <div class="circle-mask" style="width: 90px; height:90px">
                                <img class="img-circle img-bordered-sm" src="{{ asset('imgs/user-default.jpg') }}"
                                    alt="">
                            </div>
                        @endif
                    </div>

                    <h3 class="profile-username text-center mb-0">{{ $tutor->apell }}</h3>
                    <h3 class="profile-username text-center mt-0">{{ $tutor->name }}</h3>

                    <p class="text-muted text-center">Tutor</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>DNI</b> <span class="float-right">{{ $tutor->dni }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Sexo</b> <span class="float-right">{{ Str::upper($tutor->sexo) }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Correo</b> <span class="float-right">{{ $tutor->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Celular</b> <span class="float-right">{{ $tutor->celular }}</span>
                        </li>
                    </ul>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
