<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithSorting;
use App\Models\Postulante;
use Livewire\Component;
use Livewire\WithPagination;

class PostulantesTable extends Component
{
    use WithPagination;
    use WithSorting;
    public $search = '';
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

    public function render()
    {
        return view('livewire.postulantes-table', [
            'postulantes' => Postulante
                ::where('nombre', 'LIKE', "%{$this->search}%")->orderBy($this->sortBy, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}
