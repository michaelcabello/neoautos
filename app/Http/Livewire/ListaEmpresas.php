<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListaEmpresas extends Component
{

    use WithPagination;
    public $view = "grid";

    public function render()
    {

        //$business = User::all();
        //$business = User::all();
        $business = User::where('state', 1)->paginate(20);

        return view('livewire.lista-empresas', compact('business'));
    }
}
