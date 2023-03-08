<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movement;
use Illuminate\Http\Response;

class MovementEdit extends Component
{
    //public Movement $movement; 

    public $movement;
    
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
    public $pintada  ;
    public $metros ; 
    public $product_name;
    public $product_code;
    


    protected $rules = [
        'tipo' => 'required|min:4',
       // 'description' => 'required|min:4',
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
        $this->product_name = $this->movement->product->name;
        $this->product_code = $this->movement->product->code;
        $this->pintada = $this->movement->pintada;
        $this->metros = $this->movement->metros;
        
        

       // dd($this->movement->id);

        $this->emit('editMovementWasSet');
    }

    public function calcularCantidad($pintada, $metros){
        //  dd($pintada, $metros);
              $this->cantidad = ($this->pintada * $this->metros);
              /* $this->pintada = $pintada;
              $this->metros = $metros; */
      
          }


    public function updateMovement()
          {
               
              /* || auth()->user()->cannot('update', $this->comment))  */
              
              if (auth()->guest()){
                  abort(Response::HTTP_FORBIDDEN);
              }
      
              $this->validate();


             $this->movement->description =  $this->description ;
             $this->movement->cantidad = $this->cantidad ;
             $this->movement->lote =  $this->lote ;
            
             $this->movement->pintada =  $this->pintada ;
             $this->movement->metros = $this->metros;

      
            
              $this->movement->save();
      
              $this->emit('movementWasUpdated', 'Movimiento Actualizado');
          }



    public function render()
    {
        return view('livewire.movement-edit');
    }
}
