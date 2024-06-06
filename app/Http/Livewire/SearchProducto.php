<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducto extends Component
{

    public $search="";

    public function render()
    {
        return view('livewire.search-producto');
    }


    //propiedad computada
    public function getResultsProperty(){
        return Product::where('name', 'LIKE', '%'. $this->search .'%')
                     ->where('state',1)
                     ->take(8)->get();
    }


}

