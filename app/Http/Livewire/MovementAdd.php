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
    public $comment;
    protected $rules = [
        'comment' => 'required|min:4',
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
            'product_id' => $this->product->id,
            'status_id' => 1,
            'body' => $this->comment,
        ]);

       
       /*  $this->reset('comment');
 $this->idea->user->notify(new CommentAdded($newComment));

        $this->emit('commentWasAdded', 'Comment was posted!'); */
    }

    
    public function render()
    {
        return view('livewire.movement-add');
    }
}
