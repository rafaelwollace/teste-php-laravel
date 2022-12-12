<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\PedidosCompras as pedcModel;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\StatusPedidos;
use Livewire\WithPagination;

class Compras extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $fk_id_produtos, $fk_id_clientes, $fk_id_status, $NumeroPedido, $Quantidade, $DtPedido, $comp_id;
    public $paginate = 20, $search;
    public $is_update = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function render()
    {
        $clientes = Clientes::all();
        $produtos = Produtos::all();
        $statuspedidos = StatusPedidos::all();

        $compras =  $this->search === null
            ? pedcModel::latest()->paginate($this->paginate)
            : pedcModel::latest()->where('NumeroPedido', 'like', '%' . $this->search . '%')
            ->orWhere('DtPedido', 'like', '%' . $this->search . '%')
            ->orWhere('Quantidade', 'like', '%' . $this->search . '%')->paginate($this->paginate);

        return view('livewire.compras.compra', compact('compras', 'clientes', 'produtos', 'statuspedidos'));
    }

    private function clearForm()
    {
        $this->fk_id_produtos = '';
        $this->fk_id_clientes = '';
        $this->fk_id_status = '';
        $this->Quantidade = '';
    }

    public function store()
    {
        $validated = $this->validate([
            'fk_id_produtos' => 'required',
            'fk_id_clientes' => 'required',
            'fk_id_status' => 'required',
            'Quantidade' => 'required',
        ]);

        $min = 1;
        $max = 100000;

        pedcModel::create([
            'fk_id_produtos' => $this->fk_id_produtos,
            'fk_id_clientes' => $this->fk_id_clientes,
            'fk_id_status' => $this->fk_id_status,
            'Quantidade' => $this->Quantidade,
            'NumeroPedido' => rand($min, $max),
            'DtPedido' => $this->DtPedido,
        ]);

        session()->flash('message', 'Compra relizada com Sucesso!!!');

        $this->clearForm();
    }

    public function edit($id)
    {
        $compras = pedcModel::where('id', $id)->first();

        $this->is_update = true;
        $this->comp_id = $id;
        $this->fk_id_produtos = $compras->fk_id_produtos;
        $this->fk_id_clientes = $compras->fk_id_clientes;
        $this->fk_id_status = $compras->fk_id_status;
        $this->Quantidade = $compras->Quantidade;
    }

    public function cancel()
    {
        $this->is_update = false;
        $this->clearForm();
    }

    public function update()
    {

        $data =  $this->validate([
            'fk_id_produtos' => 'required',
            'fk_id_clientes' => 'required',
            'fk_id_status' => 'required',
            'Quantidade' => 'required',
        ]);

        pedcModel::whereId($this->comp_id)->update($data);

        $this->is_update = false;
        $this->clearForm();

        session()->flash('message', 'Compra Atualizado com Sucesso!!!');
    }

    public function delete($id)
    {
        $clientes = pedcModel::findOrFail($id);
        $clientes->delete();
        session()->flash('message', 'Compra Deletado com Sucesso!!!');
    }
}
