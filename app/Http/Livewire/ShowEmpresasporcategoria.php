<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class ShowEmpresasporcategoria extends Component
{
    use WithPagination;

    public $category; 


    public function mount(Category $category)
    {
        $this->category = $category;

    }




    public function render()
    {

        $name = $this->category->name;
        $business = $this->category->business;
        /* $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        }); */

        return view('livewire.show-empresasporcategoria', compact('business', 'name'));
    }
}
