<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;
use App\Http\Livewire\Traits\WithAuthRedirects;

class CreateProduct extends Component
{

    use WithAuthRedirects;

    public $title;
    public $category ;
    public $description;
    public $code;
    public $ean ='ean';
    public $name;
    public $price;
    public $medida='Kg';
    public $status= true;

    public $medidas = ['Kg','Unidad','Litros','Gr'];


    protected $rules = [
        'code' => 'required|min:2',
        'name' => 'required',
       // 'ean' => 'required|min:4',

        'category' => 'required|integer|exists:categories,id',
        //'description' => 'required|min:4',
        //'price' => 'required',
        'medida' => 'required',
        //'status' => 'required|min:4',

    ];

    public function createProduct()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $product = Product::create([

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

        //$idea->vote(auth()->user());

        session()->flash('success_message', 'Producto Añadido Correctamente!');

        $this->reset();

        return redirect()->route('product.index');
    }




    public function render()
    {
        return view('livewire.create-product', [
            'categories' => Category::all(),
            'medidas' => $this->medidas,
        ]);
    }
}
