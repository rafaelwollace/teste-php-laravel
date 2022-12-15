<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Vagas as VagModel;
use App\Models\VagaCandidato as VagaCandidato;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Welcome extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 20, $search;
    public  $cad_id;

    public function render()
    {
        $vagas =  VagModel::latest()->where('status_vaga', 1)->paginate($this->paginate);
           
        return view('livewire.welcomes.welcome', compact('vagas'));
    }

    public function cadidatase($cad_id)
    {

        $id_user = Auth::user()->id;

        VagaCandidato::create([
            'fk_users' => $id_user,
            'fk_vagas' => $cad_id,    
        ]);

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Você de candidatou a uma Vaga."
        ]);
    }




}