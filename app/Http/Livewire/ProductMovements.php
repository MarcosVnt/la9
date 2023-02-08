<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Movement;

class ProductMovements extends Component
{

    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product-movements', [

            // 'comments' => $this->idea->comments()->paginate()->withQueryString(),
            'movements' => Movement::with(['user'])->where('product_id', $this->product->id)->paginate()->withQueryString(),
        ]);
    }
}
