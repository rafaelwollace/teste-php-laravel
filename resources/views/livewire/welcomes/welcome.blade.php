<div>
    <div class="row">
      @foreach($vagas as $row)
          <div class="col-sm-4 py-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $row->titulo_vaga }}</h5>
                <p class="card-text">{{ $row->descricao_vaga }}</p>
                <center>
                  <?php if(isset(Auth::user()->id)): ?>
                    <button wire:click="cadidatase({{ $row->id }})" class="btn btn-success btn-sm">Candidata-se</button>
                  <?php endif; ?>
                  <button class="btn btn-light btn-sm">{{ $row->tipo_vaga }}</button>
                </center>
              </div>
            </div>
          </div>
          @endforeach 
      </div>

    <div class="d-flex">
        {{ $vagas->links() }}
    </div>
</div>