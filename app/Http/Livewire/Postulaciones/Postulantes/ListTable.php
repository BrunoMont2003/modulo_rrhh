<?php

namespace App\Http\Livewire\Postulaciones\Postulantes;

use App\Http\Traits\WithSorting;
use App\Models\Postulacion;
use App\Models\Postulante;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use WithPagination;
    use WithSorting;
    public $search = '';
    public $confirmingPostulacionesDeletion = false;
    public $confirmingPostulacionDeletion = false;
    public $selectedPostulante = null;
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

    public function confirmPostulacionesDeletion(Postulante $postulante)
    {
        $this->confirmingPostulacionesDeletion = true;
        $this->selectedPostulante = $postulante;

        $this->emit('open-custom-modal', 'confirm-postulaciones-deletion');
    }

    public function confirmPostulacionDeletion(Postulacion $postulacion)
    {
        $this->selectedPostulacion = $postulacion;
        $this->confirmingPostulacionDeletion = true;
    }
    public function cerrarModal()
    {
        $this->confirmingPostulacionesDeletion = false;
        $this->selectedPostulante = null;
        $this->confirmingPostulacionDeletion = false;
        $this->selectedPostulacion = null;
    }


    public function render()
    {
        $postulantes = Postulante
            ::has('postulaciones')
            ->where('nombre', 'LIKE', "%{$this->search}%")->orderBy($this->sortBy, $this->sortDirection)
            ->with(['postulaciones' => function ($query) {
                $query->orderBy('fecha_postulacion', 'desc');
            }])
            ->paginate(10);
        return view(
            'livewire.postulaciones.postulantes.list-table',
            [
                'postulantes' => $postulantes,
            ]

        );
    }
}
