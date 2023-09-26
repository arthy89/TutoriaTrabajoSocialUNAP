@extends('Layouts.app')

@section('header')
    <h1>Estudiantes</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('admin.estudiantes.estlist')
        </div>
    </div>
@endsection
