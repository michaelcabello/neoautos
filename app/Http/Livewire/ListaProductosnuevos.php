<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListaProductosnuevos extends Component
{
    use WithPagination;

    public $view = "grid";

    public $items;

    public function mount(Item $items)
    {

        // $this->identificador=rand();
        $this->items = $items;

    }

    public function render()
    {
        //1 es nuevo  2 es usado
        $products = Product::where('state', 1)->where('newused',1)->where('item_id', $this->items->id)->paginate(20);
        //dd($products);

        return view('livewire.lista-productosnuevos', compact('products'));
    }
}
