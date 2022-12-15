@extends('layouts.content')
@section('titulo', 'Vagas')
@section('conteudo')

<div class="card-body">
<table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>TÍTULO</th>
                <th>DESCRIÇÃO</th>
                <th>STATUS</th>
                <th>TIPO</th>
                <th>AÇÃO</th>
            </tr>
        </thead>
        <tbody>
             @foreach($vagas as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->fk_vagas }}</td>
                </tr>
            @endforeach 
        </tbody>

    </table>
</div>

@endsection