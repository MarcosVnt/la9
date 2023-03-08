<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movement;

class ProductMovement extends Component
{

    public $movement;
    public $productUserId;


    protected $listeners = ['movementWasUpdated'];

    public function movementWasUpdated()
    {
        $this->movement->refresh();
    }



    public function mount(Movement $movement, $productUserId)
    {
        $this->movement = $movement;
        $this->productUserId = $productUserId;
    }


    public function render()
    {
        return view('livewire.product-movement');
    }
}
