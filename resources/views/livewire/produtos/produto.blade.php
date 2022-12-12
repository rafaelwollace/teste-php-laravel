<div>
    @if($is_update)
        @include('livewire.produtos.update')
    @else
        @include('livewire.produtos.create')
    @endif
    
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @include('livewire.componentes.search')
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>NOME</th>
                <th>COD.BARRAS</th>
                <th>VALOR UNITARIO</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->NomeProduto }}</td>
                    <td>{{ $row->CodBarras }}</td>
                    <td>{{ $row->ValorUnitario }}</td>
                    <td>
                    <button wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm">Editar</button>
                    <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        {{ $produtos->links() }}
    </div>
</div>