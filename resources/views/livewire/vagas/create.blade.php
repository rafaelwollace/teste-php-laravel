<form>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="titulo_vaga">Titulo:</label>
                <input type="text" class="form-control" id="titulo_vaga" placeholder="Digite o Nome" wire:model="titulo_vaga" maxlength="120">
                @error('titulo_vaga') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="EMAIL">Status:</label>
                    <select class="form-control" name="status_vaga" id="status_vaga"  wire:model="status_vaga">
                        <option value="1" selected>Ativo</option>
                        <option value="0">Pausar Vaga</option>
                    </select>
                @error('status_vaga') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="EMAIL">Tipo Vaga:</label>
                    <select class="form-control" name="tipo_vaga" id="tipo_vaga"  wire:model="tipo_vaga">
                        <option value="1" selected>Ativo</option>
                        <option value="0">Pausar Vaga</option>
                    </select>
                @error('tipo_vaga') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
      </div>


        <div class="form-group">
            <label for="descricao_vaga">Descrição da Vaga:</label>
            <textarea class="form-control" id="descricao_vaga" placeholder="Digite o Descrição da Vaga" rows="3" wire:model="descricao_vaga"></textarea>
            @error('descricao_vaga') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

   

    <br />
    <button wire:click.prevent="store()" class="btn btn-success">Cadastrar</button>
</form>

