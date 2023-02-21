<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Movement;
use Illuminate\Http\Response;

class ProductDelete extends Component
{

    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function deleteProduct()
    {
        //dd(auth()->guest());
        // || auth()->user()->cannot('delete', $this->product)
        if (auth()->guest() 
       ) {
            abort(Response::HTTP_FORBIDDEN);
        }

        Movement::where('product_id', $this->product->id)->delete();

        Product::destroy($this->product->id);

        return redirect()->route('product.index');
    }





    public function render()
    {
        return view('livewire.product-delete');
    }
}
