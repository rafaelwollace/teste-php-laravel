<form>
    <div class="form-group">
        <input type="hidden" wire:model="prod_id">
        <label for="NomeProduto">Produto</label>
        <input type="text" class="form-control" wire:model="NomeProduto" id="NomeProduto" placeholder="Digite o Produto">
        @error('NomeProduto') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="CodBarras">CodBarras</label>
        <input type="text" class="form-control" wire:model="CodBarras" id="CodBarras" placeholder="Digite o CodBarras">
        @error('CodBarras') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="ValorUnitario">Valor</label>
        <input type="number" class="form-control" wire:model="ValorUnitario" id="ValorUnitario" placeholder="Digite o Valor">
        @error('ValorUnitario') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-success">Atualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>