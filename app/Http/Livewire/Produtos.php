<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produtos as ProdModel;
use Livewire\WithPagination;

class Produtos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $NomeProduto, $CodBarras, $ValorUnitario, $paginate = 20, $search, $prod_id;
    public $is_update = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {

        $produtos =  $this->search === null
            ? ProdModel::latest()->paginate($this->paginate)
            : ProdModel::latest()->where('NomeProduto', 'like', '%' . $this->search . '%')
            ->orWhere('CodBarras', 'like', '%' . $this->search . '%')
            ->orWhere('ValorUnitario', 'like', '%' . $this->search . '%')->paginate($this->paginate);

        // ProdModel::orderBy('id',  'DESC')->paginate(20);
        return view('livewire.produtos.produto', compact('produtos'));
    }

    private function clearForm()
    {
        $this->NomeProduto = '';
        $this->CodBarras = '';
        $this->ValorUnitario = '';
    }

    public function store()
    {
        $validated = $this->validate([
            'NomeProduto' => 'required|max:100',
            'CodBarras' => 'required|min:20|max:20',
            'ValorUnitario' => 'required',
        ]);

        ProdModel::create($validated);

        session()->flash('message', 'Cadastro relizado com Sucesso!!!');

        $this->clearForm();
    }

    public function edit($id)
    {
        $produtos = ProdModel::where('id', $id)->first();

        $this->is_update = true;
        $this->prod_id = $id;
        $this->NomeProduto = $produtos->NomeProduto;
        $this->CodBarras = $produtos->CodBarras;
        $this->ValorUnitario = $produtos->ValorUnitario;
    }

    public function cancel()
    {
        $this->is_update = false;
        $this->clearForm();
    }

    public function update()
    {

        $data =  $this->validate([
            'NomeProduto' => 'required|max:100',
            'CodBarras' => 'required|min:20|max:20',
            'ValorUnitario' => 'required',
        ]);

        ProdModel::whereId($this->prod_id)->update($data);

        $this->is_update = false;
        $this->clearForm();

        session()->flash('message', 'Produto Atualizado com Sucesso!!!');
    }

    public function delete($id)
    {
        $produtos = ProdModel::findOrFail($id);
        $produtos->delete();
        session()->flash('message', 'Produto Deletado com Sucesso!!!');
    }
}
