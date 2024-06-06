<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class ShowCategories extends Component
{

    use WithPagination;

    public $search, $categoriess, $state;

    /* cada vez que se modifique search ejecutara resetpage */
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
         $categories = Category::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.show-categories', compact('categories'))->layout('layouts.admin'); 
       
    }

    public function activar(Category $category){
        $this->categoriess = $category;

        $this->categoriess->update([
            'state' => 1
        ]);
    }

    public function desactivar(Category $category){
        $this->categoriess = $category;

        $this->categoriess->update([
            'state' => 0
        ]);
    }
}
