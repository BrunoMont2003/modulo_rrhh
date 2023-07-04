<?php

namespace App\Http\Livewire\Puestos;

use App\Http\Traits\WithSorting;
use App\Models\Puesto;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use WithPagination;
    use WithSorting;
    public $search = '';
    public $confirmingPuestoDeletion = false;
    public $selectedPuesto = null;
    protected $listeners = ['sort', 'search'];
    protected $queryString = [

        'search' => ['except' => '', 'as' => 's'],

        'page' => ['except' => 1, 'as' => 'p'],

    ];

    public function sort($field)
    {
        $this->sortBy($field);
        $this->resetPage();
    }

    public function search($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function confirmPuestoDeletion(Puesto $puesto)
    {
        $this->confirmingPuestoDeletion = true;
        $this->selectedPuesto = $puesto;

        $this->emit('open-custom-modal', 'confirm-puesto-deletion');
    }

    public function cerrarModal()
    {
        $this->confirmingPuestoDeletion = false;
        $this->selectedPuesto = null;
    }

    public function render()
    {
        return view('livewire.puestos.list-table', [
            'puestos' => Puesto::select('puestos.*', 'equipos.nombre as equipo')
                ->where('puestos.nombre', 'LIKE', "%{$this->search}%")
                ->join('equipos', 'puestos.equipo_id', '=', 'equipos.id')
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}
