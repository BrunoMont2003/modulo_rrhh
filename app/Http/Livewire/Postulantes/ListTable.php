<?php

namespace App\Http\Livewire\Postulantes;

use App\Http\Traits\WithSorting;
use App\Models\Postulante;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use WithPagination;
    use WithSorting;
    public $search = '';
    public $confirmingPostulanteDeletion = false;
    public $selectedPostulante = null;
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

    public function confirmPostulanteDeletion(Postulante $postulante)
    {
        $this->confirmingPostulanteDeletion = true;
        $this->selectedPostulante = $postulante;

        $this->emit('open-custom-modal', 'confirm-postulante-deletion');
    }

    public function cerrarModal()
    {
        $this->confirmingPostulanteDeletion = false;
        $this->selectedPostulante = null;
    }

    public function render()
    {
        return view('livewire.postulantes.list-table', [
            'postulantes' => Postulante
                ::where('nombre', 'LIKE', "%{$this->search}%")->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}
