@extends('layouts.content')
@section('titulo', 'Vagas')
@section('conteudo')

<div class="card-header">
    <center>
        <h2>Vagas</h2>
    </center>
</div>

<div class="card-body">
    @livewire('vagas')
</div>

@endsection