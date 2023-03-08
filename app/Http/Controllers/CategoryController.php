<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

     //

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
       // return view('product.index');
       return view('category.index', [
      
       /*  'votesCount' => $product->votes()->count(),
        'backUrl' => url()->previous() !== url()->full() && url()->previous() !== route('login')
            ? url()->previous()
            : route('product.index'), */
    ]);
    }
}
