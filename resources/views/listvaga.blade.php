@extends('layouts.content')
@section('titulo', 'Vagas')
@section('conteudo')

<div class="card-body">
<table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>TITULO</th>
                <th>TIPO</th>
                <th>USER</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
             @foreach($vagas as $row)
                <tr>
                    <td>{{ $row->cadt_id }}</td>
                    <td>{{ $row->titulo_vaga }}</td>
                    <td>{{ $row->tipo_vaga }}</td>
                    <td>{{ $row->name }}</td>
                    <td> @if( $row->status_vaga == '1' )
                        <span class="badge badge-success">Ativa</span>
                    @else
                        <span class="badge badge-warning">Vaga Pausada</span>
                    @endif
                    </td>
                </tr>
            @endforeach 
        </tbody>

    </table>
</div>

@endsection