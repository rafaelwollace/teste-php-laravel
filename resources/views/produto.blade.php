@extends('layouts.content')
@section('titulo', 'Produtos')
@section('conteudo')

<div class="card-header">
    <center>
        <h2>Produtos</h2>
    </center>
</div>

<div class="card-body">
    @livewire('produtos')
</div>

@endsection