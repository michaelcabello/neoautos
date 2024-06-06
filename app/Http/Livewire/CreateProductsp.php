<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CreateProductsp extends Component
{
    public $open = false;
    public $tipo, $name;


    public function mount(){
        //$this->user_id = User::findOrFail(Auth::user()->id);
        $this->user_id = Auth::user()->id;
        $this->tipo = 1;
        //dd($this->user_id);

    }

    public function updatedName($value){
        if(Auth::user()->razonsocial){
            $slug = $value." ".Auth::user()->razonsocial." ".Str::random(3);
        }else{
            $slug = $value." ".Auth::user()->name." ".Str::random(3);
        }

        $this->slug = Str::slug($slug);
    }


    protected $rules = [
        //'tipo'=> 'required',
        'name'=> 'required',
    ];



    public function save(){
        $this->validate();

        $product = Product::create([
            'tipo' => $this->tipo,
            'name' => $this->name,
            'slug' => $this->slug,
                        //Str::slug($value);
            'user_id' => $this->user_id,

        ]);

        $this->reset(['open','tipo','name']);

        /*$this->reset('open','title','content','image'); */
        // $this->reset(['open','title','content','image']);

       // $this->emitTo('show-posts', 'render');
        //$this->emit('render');
        $this->emit('alert','El registro se creo correctamente');
        return redirect()->route('products.editd', $product);
    }



    public function render()
    {
        return view('livewire.create-productsp');
    }
}
