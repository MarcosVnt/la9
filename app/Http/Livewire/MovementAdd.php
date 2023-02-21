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

    protected $rules = [
        'tipo' => 'required|min:4',
        'description' => 'required|min:4',
        'cantidad' => 'required|min:1',
     
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addComment()
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
            'lote' => $this->lote,
            'status' => '1',
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


        session()->flash('success_message', 'Product was added successfully!');

        $this->reset();

        return redirect()->route('product.index');

       /*  $this->reset('comment');
 $this->idea->user->notify(new CommentAdded($newComment));

        $this->emit('commentWasAdded', 'Comment was posted!'); */
    }

    
    public function render()
    {
        return view('livewire.movement-add');
    }
}
