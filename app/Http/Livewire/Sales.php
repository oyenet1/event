<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class Sales extends Component
{
    use WithPagination;

    public $paginate = 20;
    public $search;

    public function render()
    {
        $search = '%' . $this->search . '%';
        $sales = Sale::latest()->where('reference', 'LIKE', $search)->paginate($this->paginate);
        return view('livewire.sales', compact(['sales']));
    }
}
