      <div class="row">
        <div class="col">
            <select wire:model="paginate" class="form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col">
            <input wire:model="search" type="search" class="form-control" placeholder="Digite aqui o que você procura">
        </div>
    </div>

    <br />