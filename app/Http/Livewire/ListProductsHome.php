<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ListProductsHome extends Component
{

    public $view = "grid";

    public function render()
    {
        $productos = Product::where('state', 1)->orderBy('id', 'desc')->take(12)->get();
        return view('livewire.list-products-home', compact('productos'));
    }
}
