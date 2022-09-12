<?php

namespace App\Http\Livewire;

use App\Models\Meal;
use Livewire\Component;

class MealModals extends Component
{

    public $mealModel = [];
    protected $listeners = ['showMealAction'];

    public function showMealAction($id)
    {
      $this->mealModel = Meal::where('id',$id)->firstOrFail();
    }

    public function render()
    {
      return view('livewire.meal-modals');
    }
}
