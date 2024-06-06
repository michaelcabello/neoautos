<?php

namespace App\View\Components;

use App\Models\Item;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */


    public function render()
    {
        //$items = Item::where('state', 1)->get();
        $items = Item::all();
        return view('layouts.app', compact('items'));

    }
}
