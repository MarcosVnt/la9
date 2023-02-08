<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{

    public $product; 


    public function mount(Product $product)
    {
        $this->product = $product;

      /*   $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isVotedByUser(auth()->user()); */
    }


    public function render()
    {
        return view('livewire.product-show');
    }
}
