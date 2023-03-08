<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $perPage = 20;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function entradas()
    {

    }

   /*  public function salidas(){
        $this->product->withSum(['movements as entradas' => fn ($query) => $query->where('tipo', '=', 'entrada')], 'cantidad')

    } */
  
}
