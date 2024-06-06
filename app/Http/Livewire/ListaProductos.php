<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListaProductos extends Component
{

    use WithPagination;

    public $view = "grid";


    public function render()
    {
        //$products = Product::all();
        $products = Product::where('state', 1)->paginate(20);
        //dd($products);
        return view('livewire.lista-productos', compact('products'));
    }
}
