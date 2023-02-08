<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
{


    public $product;
    

    public function mount(Product $product)
    {
        $this->product = $product;
       
    }



    public function render()
    {
        return view('livewire.product-index');
    }
}
