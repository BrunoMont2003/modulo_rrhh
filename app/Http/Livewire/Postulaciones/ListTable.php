<?php

namespace App\Http\Livewire\Postulaciones;

use App\Http\Traits\WithSorting;
use App\Models\Postulacion;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use WithPagination;
    use WithSorting;
    public $search = '';
    public $confirmingPostulacionDeletion = false;
    public $selectedPostulacion = null;
    public $expandedRows = [];

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

    public function toggleExpanded($id)
    {
        if (isset($this->expandedRows[$id])) {
            unset($this->expandedRows[$id]);
        } else {
            $this->expandedRows[$id] = true;
        }
    }
    public function confirmPostulacionDeletion(Postulacion $postulacion)
    {
        $postulacion->load('postulante', 'plaza');
        $this->selectedPostulacion = $postulacion;
        $this->confirmingPostulacionDeletion = true;
    }
    public function cerrarModal()
    {
        $this->selectedPostulacion = null;
        $this->confirmingPostulacionDeletion = false;
    }


    public function render()
    {
        $postulaciones = Postulacion::select('postulaciones.*', 'postulantes.nombre as nombre_postulante', 'puestos.nombre as puesto')
            ->join('postulantes', 'postulaciones.postulante_id', '=', 'postulantes.id')
            ->join('plazas', 'postulaciones.plaza_id', '=', 'plazas.id')
            ->join('puestos', 'plazas.puesto_id', '=', 'puestos.id')
            ->where('postulantes.nombre', 'LIKE', "%{$this->search}%")
            ->orWhere('puestos.nombre', 'LIKE', "%{$this->search}%")
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);
        return view(
            'livewire.postulaciones.list-table',
            [
                'postulaciones' => $postulaciones,
            ]
        );
    }
}
