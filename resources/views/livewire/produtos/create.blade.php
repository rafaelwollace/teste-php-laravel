<form>
    <div class="form-group">
        <label for="NomeProduto">Produto:</label>
        <input type="text" class="form-control" id="NomeProduto" placeholder="Digite o Nome" wire:model="NomeProduto" maxlength="100">
        @error('NomeProduto') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="CodBarras">CodBarras:</label>
        <input type="text" class="form-control" id="CodBarras" placeholder="Digite o CodBarras" wire:model="CodBarras" maxlength="20" minlength="20">
        @error('CodBarras') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="ValorUnitario">Valor:</label>
        <input type="number" class="form-control" id="ValorUnitario" placeholder="Digite o Valor" wire:model="ValorUnitario">
        @error('ValorUnitario') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <br />
    <button wire:click.prevent="store()" class="btn btn-success">Cadastrar</button>
</form>

