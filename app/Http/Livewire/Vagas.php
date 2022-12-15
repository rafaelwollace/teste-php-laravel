<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Vagas as VagModel;
use App\Models\VagaCandidato as VagaCandidato;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Vagas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 20, $search;
    public $titulo_vaga, $descricao_vaga, $status_vaga, $tipo_vaga, $id_vaga, $cad_id;
    public $is_update = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function render()
    {
        $vagas =  $this->search === null
            ? VagModel::latest()->paginate($this->paginate)
            : VagModel::latest()->where('titulo_vaga', 'like', '%' . $this->search . '%')
            ->orWhere('titulo_vaga', 'like', '%' . $this->search . '%')
            ->orWhere('titulo_vaga', 'like', '%' . $this->search . '%')->paginate($this->paginate);

        return view('livewire.vagas.vaga', compact('vagas'));
    }

    public function vagas()
    {
        $vagas =  VagModel::latest()->where('status_vaga', 1)->paginate($this->paginate);
           
        return view('listvagas', compact('vagas'));
    }

    private function clearForm()
    {
        $this->titulo_vaga = '';
        $this->descricao_vaga = '';
        $this->status_vaga = '';
        $this->tipo_vaga = '';
    }


    public function cadidatase($cad_id)
    {

        $id_user = Auth::user()->id;

        VagaCandidato::create([
            'fk_user' => $id_user,
            'fk_vagas' => $cad_id,    
        ]);

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Você de candidatou a uma Vaga."
        ]);
    }


    public function store()
    {
        $validated = $this->validate([
            'titulo_vaga' => 'required|max:120',
            'descricao_vaga' => 'required',
            'status_vaga' => 'required',
            'tipo_vaga' => 'required',
        ]);

        VagModel::create($validated);
        $this->clearForm();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Vaga cadastrada com Sucesso!"
        ]);
    }

    public function edit($id)
    {
        $vagas = VagModel::where('id', $id)->first();

        $this->is_update = true;
        $this->id_vaga = $id;
        $this->titulo_vaga = $vagas->titulo_vaga;
        $this->descricao_vaga = $vagas->descricao_vaga;
        $this->status_vaga = $vagas->status_vaga;
        $this->tipo_vaga = $vagas->tipo_vaga;
    }

    public function cancel()
    {
        $this->is_update = false;
        $this->clearForm();
    }

    public function update()
    {
        $data =  $this->validate([
            'titulo_vaga' => 'required',
            'descricao_vaga' => 'required',
            'status_vaga' => 'required',
            'tipo_vaga' => 'required'
        ]);

        VagModel::whereId($this->id_vaga)->update($data);

        $this->is_update = false;
        $this->clearForm();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Vaga alterada com Sucesso!"
        ]);
    }

    public function delete($id)
    {
        $clientes = VagModel::findOrFail($id);
        $clientes->delete();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Vaga deletada com Sucesso!"
        ]);
    }
}