<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{

    public $product; 

    protected $listeners = [
       
        'productWasUpdated',
    ];


    public function mount(Product $product)
    {
        $this->product = $product;

       

      /*   $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isVotedByUser(auth()->user()); */
    }

    public function productWasUpdated()
    {
        $this->product->refresh();
    }



    public function render()
    {
        return view('livewire.product-show');
    }
}
