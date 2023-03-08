<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;


class ProductEdit extends Component
{

    public $product;
    public $title;
    public $category = 1;
    public $description;
    public $code;
    public $ean = 'ean';
    public $name;
    public $price;
    public $medida = 'Kg';
    public $status = true;


    public $medidas = ['Kg', 'Unidad', 'Litros', 'Gr'];


    public function mount(Product $product)
    {
        $this->product = $product;
        $this->title = $product->title;
        $this->category = $product->category_id;
        $this->code = $product->code;
        $this->description = $product->description;
        $this->ean = $product->ean;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->medida = $product->medida;
        $this->status = $product->status;
    }

    protected $rules = [
        'code' => 'required|min:2',
        'name' => 'required',
        // 'ean' => 'required|min:4',

        'category' => 'required|integer|exists:categories,id',
       // 'description' => 'required|min:4',
       // 'price' => 'required',
        'medida' => 'required',
        //'status' => 'required|min:4',

    ];


    public function updateProduct()
    {

        $this->product->update([

            //'user_id' => auth()->id(),
            'category_id' => $this->category,
            'status_id' => 1,
            'ean' => $this->ean,
            'description' => $this->description,
            'code' => $this->code,
            'name' => $this->name,
            'price' => $this->price,
            'medida' => $this->medida,
            'status' => $this->status,


        ]);

        $this->emit('productUpdated');

        //$idea->vote(auth()->user());

        session()->flash('success_message', 'Product was updated successfully!');

        $this->reset();

        return redirect()->route('product.index');
    }



    public function render()
    {
        return view('livewire.product-edit', [
            'categories' => Category::all(),
        ]);
    }
}
