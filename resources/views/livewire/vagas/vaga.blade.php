<div>
  
    @if($is_update)
        @include('livewire.vagas.update')
    @else
        @include('livewire.vagas.create')
    @endif 

    @include('livewire.componentes.search')

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
                    <td>{{ $row->titulo_vaga }}</td>
                    <td>{{ $row->descricao_vaga }}</td>
                    <td>
                    @if( $row->status_vaga == '1' )
                        <span class="badge badge-success">Ativa</span>
                    @else
                        <span class="badge badge-warning">Vaga Pausada</span>
                    @endif
                    </td> 
                    <td>{{ $row->tipo_vaga }}</td> 
                    <td width="160px;">
                    <button wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm">Alterar</button>
                    <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            @endforeach 
        </tbody>

    </table>
    <div class="d-flex">
        {{ $vagas->links() }}
    </div>
</div>