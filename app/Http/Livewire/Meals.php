<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Meal;
use Livewire\WithPagination;
class Meals extends Component
{
    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function render()
    {
        return view('livewire.meals',['deals'=>Meal::with(['canteen' ,'images'])->paginate(6)]);
    }
}
