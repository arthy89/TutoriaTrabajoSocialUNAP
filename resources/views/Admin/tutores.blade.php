@extends('Layouts.app')

@section('header')
    <h1>Tutores</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('admin.tutores.tutorlist')
        </div>
    </div>
@endsection
