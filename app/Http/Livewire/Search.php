<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Search extends Component
{

    public $search="";

    public function render()
    {
        return view('livewire.search');
    }

    //propiedad computada
    public function getResultsProperty(){
        return User::where('razonsocial', 'LIKE', '%'. $this->search .'%')
                     ->where('state',1)
                     ->take(8)->get();
    }

    public function continuar($result){

        $this->search = $result;
    }

}
