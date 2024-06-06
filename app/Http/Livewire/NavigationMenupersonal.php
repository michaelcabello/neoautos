<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class NavigationMenupersonal extends Component
{


     //public $items;
    /*
    public function mount($items)
    {
        $this->items = $items;

    } */


    public function render()
    {

        $items = Item::all();
        return view('livewire.navigation-menupersonal', compact('items'));
    }
}
