<form>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" placeholder="Digite o Nome" wire:model="name" maxlength="220">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                    <select class="form-control" name="tipo" id="tipo"  wire:model="tipo">
                        <option  selected>Selecione</option>
                        <option value="1">Candidato</option>
                        <option value="0">Administrador</option>
                    </select>
                @error('tipo') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" id="email" placeholder="Digite o seu E-mail" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" placeholder="Digite a sua senha" wire:model="password">
                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
      </div>

    <br />
    <button wire:click.prevent="store()" class="btn btn-success">Cadastrar</button>
</form>

