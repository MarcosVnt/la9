<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Movement;
use Illuminate\Http\Response;
use App\Http\Livewire\Traits\WithAuthRedirects;

class MovementAdd extends Component
{

    use WithAuthRedirects;

    public $product;

    public $movement;
    public $tipo ;
    public $description;
    public $product_id;
    public $clieprov_id;
    public $user_id;
    public $cantidad;
    public $status;
    public $lote;
    public $comment;
    public $category_name;
    public $metros = 0 ;
    public $conversion;
    public $pintada = 0 ;
    public $pintada_tipo;
    public $medida;

    protected $rules = [
        'tipo' => 'required|min:4',
       
        'cantidad' => 'required',
     
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->category_name= $this->product->category->name;
        //dd($this->product->category->name);
    }

    public function addMovement()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->validate();

        $newComment = Movement::create([
            'user_id' => auth()->id(),
            'clieprov_id' => 1,
            'tipo' => $this->tipo,
            'product_id' => $this->product->id,
            'description' => $this->description,
            'cantidad' => $this->cantidad,
            'medida' => $this->medida,
            
            'lote' => $this->lote,
            'status' => '1',
           
          
            'metros' => $this->metros,
    
            'pintada_tipo' => $this->pintada_tipo,
            'pintada' => $this->pintada,

            //'body' => $this->comment,
        ]);

       
     /*    'tipo' => $this->faker->randomElement(['entrada', 'salida']),
        'description' =>  $this->faker->paragraph(5),
        'product_id' => $this->faker->numberBetween(0,10),
        'clieprov_id' => $this->faker->numberBetween(0,10),
        'user_id' => $this->faker->numberBetween(0,3),

        'cantidad' =>  $this->faker->randomFloat(1, 10, 20),
        
        'status' => 
        $this->faker->numberBetween(0,1),

        'lote' => $this->faker->name(), */


        session()->flash('success_message', 'Producto Añadido Correctamente!');

        $this->reset('movement');
        $this->description="";
        $this->cantidad = 0;
        $this->tipo = "" ; 
        $this->lote ="" ; 
        $this->pintada = 0 ; 
        $this->metros=0;
        


        $this->emit('movementWasAdded', 'Movimiento añadido Correctamente!');

        //return redirect()->route('product.index');

       /*  $this->reset('comment');
 $this->idea->user->notify(new CommentAdded($newComment));

        $this->emit('commentWasAdded', 'Comment was posted!'); */
    }


    public function calcularCantidad($pintada, $metros){
  //  dd($pintada, $metros);
        $this->cantidad = ($this->pintada * $this->metros);
        /* $this->pintada = $pintada;
        $this->metros = $metros; */

    }

    
    public function render()
    {
        return view('livewire.movement-add');
    }
}
