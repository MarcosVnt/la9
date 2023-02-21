<?php

namespace App\Http\Livewire;

use App\Models\Movement;
use Livewire\Component;

class MovementEdit extends Component
{
    public Movement $movement; 
    
    public $tipo ;
    public $description;
    public $product_id;
    public $clieprov_id;
    public $user_id;
    public $cantidad;
    public $status;
    public $lote;
    public $product;
    public $medida; 

    protected $rules = [
        'tipo' => 'required|min:4',
        'description' => 'required|min:4',
        'cantidad' => 'required|min:1',
     
    ];


    protected $listeners=['setEditMovement'];

    public function setEditMovement($movementId)

    {
       // dd($movementId);
        $this->movement = Movement::with('product')->findOrFail($movementId);
      //  dd($movementId, $this->movement);
        
        $this->description = $this->movement->description;
        $this->cantidad = $this->movement->cantidad;
        $this->lote = $this->movement->lote;
        $this->product = $this->movement->product;
        $this->tipo = $this->movement->tipo;
        $this->medida = $this->movement->product->medida;
        

       // dd($this->movement->id);

        $this->emit('editMovementWasSet');
    }

    public function render()
    {
        return view('livewire.movement-edit');
    }
}
