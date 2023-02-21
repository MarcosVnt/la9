<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithAuthRedirects;


class ProductsIndex extends Component
{

    use WithPagination, WithAuthRedirects;


    public $filter;
    public $search;
    public $searchC;
    
    public $category;

    protected $queryString = [
       
        'category',
        'filter',
        'search',
        'searchC',
    ];


    



    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilter()
    {
        if ($this->filter === 'Mis Movimientos') {
            if (auth()->guest()) {
                return $this->redirectToLogin();
            }
        }
    }

    public function render()
    {

        $categories = Category::all();

           // dd(request()->status);
        return view('livewire.products-index',
        ['products' => Product::with('user', 'category','movements')
               /*  ->when(request()->status && request()->status !== 'All', function ($query)  {
                    return $query->where('tipo',request()->status);
                }) */
                ->when($this->category && $this->category !== 'All Categories', function ($query) use ($categories) {
                    return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
                })
                ->when($this->filter && $this->filter === 'Top Movimientos', function ($query) {
                    return $query->orderByDesc('movements_count');
                })->when($this->filter && $this->filter === 'Mis Movimientos', function ($query) {
                    return $query->where('user_id', auth()->id());
                })
                ->when(strlen($this->search) >= 3, function ($query) {
                    return $query->where('name', 'like', '%'.$this->search.'%');
                })
                  ->when(strlen($this->searchC) >= 3, function ($query) {
                    return $query->where('code', 'like', '%'.$this->searchC.'%');
                })
               /*   ->when($this->tipo === 'entradas', function ($query) {
                    return $query->where('code', 'like', '%'.$this->search.'%');
                })  */
                ->withCount('movements')
                ->orderBy('id', 'desc')
                ->simplePaginate()
                ->withQueryString(),
        
         'categories' => $categories,
        ]);
    }
}

