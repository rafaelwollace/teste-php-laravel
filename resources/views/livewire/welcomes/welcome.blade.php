<div>
    <div class="row">
      @foreach($vagas as $row)
          <div class="col-sm-4 py-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $row->titulo_vaga }}</h5>
                <p class="card-text">{{ $row->descricao_vaga }}</p>
                <button wire:click="cadidatase({{ $row->id }})" class="btn btn-primary btn-sm">Editar</button>
              </div>
            </div>
          </div>
          @endforeach 
      </div>

    <div class="d-flex">
        {{ $vagas->links() }}
    </div>
</div>