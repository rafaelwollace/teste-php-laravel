@extends('layouts.content')
@section('titulo', 'Candidato / User')
@section('conteudo')

<div class="card-header">
    <center>
        <h2>Candidato / User</h2>
    </center>
</div>

<div class="card-body">
    @livewire('candidatos')
</div>

@endsection