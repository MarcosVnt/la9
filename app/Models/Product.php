<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarder = [];
    protected $perPage = 10;
    protected $fillable = ['name','code','description','category_id','medida','price','ean','status'];


    public function movements()
    {
        return $this->hasMany(Movement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    

}
