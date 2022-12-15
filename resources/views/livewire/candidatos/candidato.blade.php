<div>
     @if($is_update)
        @include('livewire.candidatos.update')
    @else
        @include('livewire.candidatos.create')
    @endif
     

    @include('livewire.componentes.search')
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>NOME</th>
                <th>EMAIL</th>
                <th>TIPO</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
          @foreach($candidatos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email  }}</td>
                    <td>
                    @if( $row->tipo == '1' )
                        <span class="badge badge-success">Candidato</span>
                    @else
                        <span class="badge badge-primary">Administrador</span>
                    @endif
                    </td>
                    <td>
                    <button wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm">Editar</button>
                    <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="d-flex">
        {{ $candidatos->links() }}
    </div>
</div>