<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($is_update)
        @include('livewire.compras.update')
    @else
        @include('livewire.compras.create')
    @endif
        
    @include('livewire.componentes.search')
    

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>PRODUTO</th>
                <th>CLIENTE</th>
                <th>STATUS</th>
                <th>Nº PEDIDO</th>
                <th>DT PEDIDO</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->produtos->NomeProduto }}</td>
                    <td>{{ $row->clientes->NomeCliente }}</td>
                    <td>
                        @if($row->statuspedidos->status == 'Em Aberto')
                            <span class="badge badge-warning"> {{ $row->statuspedidos->status }}</span>
                        @elseif($row->statuspedidos->status == 'Pago')
                            <span class="badge badge-success"> {{ $row->statuspedidos->status }}</span>
                        @else
                        <span class="badge badge-danger"> {{ $row->statuspedidos->status }}</span>
                        @endif
                        
                    </td>
                    <td>{{ $row->NumeroPedido }}</td>
                    <td>{{ $row->DtPedido }}</td>
                    <td>
                    <button wire:click="edit({{ $row->id }})" class="btn btn-primary btn-sm">Alterar</button>
                    <button wire:click="delete({{ $row->id }})" class="btn btn-danger btn-sm">Deletar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="d-flex">
        {{ $compras->links() }}
    </div>
</div>