<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movement;
use Illuminate\Http\Response;

class MovementDelete extends Component
{


    public Movement $movement;

    protected $listeners = ['setDeleteMovement'];

    public function setDeleteMovement($movementId)
    {
        $this->movement = Movement::findOrFail($movementId);

        $this->emit('deleteMovementWasSet');
    }

    public function deleteMovement()
    {
        //|| auth()->user()->cannot('delete', $this->comment)
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        Movement::destroy($this->movement->id);

       $this->emit('movementWasDeleted', 'Movimiento Borrado!');
    }



    public function render()
    {
        return view('livewire.movement-delete');
    }
}
