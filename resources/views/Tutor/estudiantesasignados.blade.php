@extends('Layouts.app')

@section('header')
    <h1>Tutorados</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('admin.estudiantes.estlist', ['tutor' => Auth::user()])
        </div>
    </div>
@endsection
