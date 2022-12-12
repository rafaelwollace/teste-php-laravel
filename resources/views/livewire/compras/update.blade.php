<form>
    <div class="form-group">
        <input type="hidden" wire:model="comp_id">
        <label for="fk_id_produtos">Produto</label>
        <select class="form-control" id="fk_id_produtos" wire:model="fk_id_produtos">
            <option>-- Selecione o Produto --</option>
            @foreach($produtos as $var)
                <option value="{{ $var->id }}"  >{{ $var->NomeProduto }}</option>
            @endforeach
        </select>
        @error('fk_id_produtos') <span class="text-danger">{{ $message }}</span>@enderror
      </div>

      <div class="form-group">
        <label for="fk_id_clientes">Cliente</label>
        <select class="form-control" id="fk_id_clientes" wire:model="fk_id_clientes">
            <option>-- Selecione o Cliente --</option>
            @foreach($clientes as $var)
                <option value="{{ $var->id }}"  >{{ $var->NomeCliente }}</option>
            @endforeach
        </select>
        @error('fk_id_clientes') <span class="text-danger">{{ $message }}</span>@enderror
      </div>

      <div class="form-group">
        <label for="fk_id_status">Status</label>
        <select class="form-control" id="fk_id_status" wire:model="fk_id_status">
            <option>-- Selecione o Status --</option>
            @foreach($statuspedidos as $var)
                <option value="{{ $var->id }}"  >{{ $var->status }}</option>
            @endforeach
        </select>
        @error('fk_id_status') <span class="text-danger">{{ $message }}</span>@enderror
      </div>

    <div class="form-group">
        <label for="Quantidade">Quantidade:</label>
        <input type="number" class="form-control" id="Quantidade" placeholder="Digite a Quantidade" wire:model="Quantidade" >
        @error('Quantidade') <span class="text-danger">{{ $message }}</span>@enderror
    </div>


    <br />
    <button wire:click.prevent="update()" class="btn btn-success">Alterar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>