<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{

    public $categories, $name, $categoryId, $updateCategory = false, $addCategory = false;
    

    protected $rules = [
        'name' => 'required',
        
    ];

    public function resetFields(){
        $this->name = '';
     
    }


    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.category.index');
    }


    public function addCategory()
    {
        $this->resetFields();
        $this->addCategory = true;
        $this->updateCategory = false;
    }

    public function storeCategory()
    {
        $this->validate();
        try {
            Category::create([
                'name' => $this->name,
            ]);
            session()->flash('success','Category Created Successfully!!');
            $this->resetFields();
            $this->addCategory = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }


    public function editCategory($id){
        try {
            $category = Category::findOrFail($id);
            if( !$category) {
                session()->flash('error','category not found');
            } else {
                $this->name = $category->name;
             
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
 
    }

    public function updatePost()
    {
        $this->validate();
        try {
            Posts::whereId($this->postId)->update([
                'title' => $this->title,
                'description' => $this->description
            ]);
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
            $this->updatePost = false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }




}
