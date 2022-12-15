<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\User as CandModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Candidatos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 20, $search;
    public $name, $tipo, $email, $password, $id_cadt;
    public $is_update = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected function rules(){
        return [
            'name' => 'required|string|max:255',
            'tipo' => 'required',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->id_cadt
        ];
    }
    
    public function render()
    {
        $candidatos =  $this->search === null
            ? CandModel::latest()->paginate($this->paginate)
            : CandModel::latest()->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')->paginate($this->paginate);

        return view('livewire.candidatos.candidato', compact('candidatos'));
    }

    private function clearForm()
    {
        $this->name = '';
        $this->tipo = '';
        $this->email = '';
        $this->password = '';
    }
    

    public function store()
    {
        $this->validate();

        CandModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'tipo' => $this->tipo,
            'password' => Hash::make($this->password),
        ]);
        
        $this->clearForm();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Candidato/User cadastrado com Sucesso!"
        ]);
    }

    public function edit($id)
    {
        $candidato = CandModel::where('id', $id)->first();

        $this->is_update = true;
        $this->id_cadt = $id;
        $this->name = $candidato->name;
        $this->tipo = $candidato->tipo;
        $this->email = $candidato->email;
        $this->password = Hash::make($candidato->password);
    }

    public function cancel()
    {
        $this->is_update = false;
        $this->clearForm();
    }

    public function update()
    {

        $this->validate();

        CandModel::whereId($this->id_cadt)->update([
                'name' => $this->name,
                'email' => $this->email,
                'tipo' => $this->tipo,
                'password' => Hash::make($this->password),
            ]);

        $this->is_update = false;
        $this->clearForm();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Candidato/User  alterada com Sucesso!"
        ]);
    }

    public function delete($id)
    {
        $clientes = CandModel::findOrFail($id);
        $clientes->delete();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'error',
            'message'=>"Candidato/User deletado com Sucesso!"
        ]);
    }
}