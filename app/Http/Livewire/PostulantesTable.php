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
    protected $listeners = ['sort'];

    public function sort($field)
    {
        $this->sortBy($field);
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.postulantes-table', [
            'postulantes' => Postulante::orderBy($this->sortBy, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}
