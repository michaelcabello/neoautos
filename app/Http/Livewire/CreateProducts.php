<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CreateProducts extends Component
{

    public $name, $shortdescription, $longdescription, $order, $state, $slug, $title, $description, $keywords, $user_id;

    public function mount(){
        //$this->user_id = User::findOrFail(Auth::user()->id);
        $this->user_id = Auth::user()->id;
        //dd($this->user_id);

    }


    public function render()
    {
        return view('livewire.create-products');
    }


    protected $rules = [
        'name'=> 'required',
        'slug'=> 'required|unique:products,slug',
        'shortdescription'=>'required|min:3',
        'longdescription'=>'required|min:3',
        'title'=> 'min:5',
        'description'=> 'min:5',
        'keywords'=> 'min:5',
    ];


    public function save(){
        $this->validate();


        if ($this->state == true) {
            $status = 1;
        }else{
            $status = 0;
        }



        Product::create([
            'name' => Str::title($this->name),
            'slug' => $this->slug,
            'price' => 1000,
            'shortdescription' => $this->shortdescription,
            'longdescription' => $this->longdescription,
            'order' => $this->order,
            'state' => $status,
            'title' => $this->title,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'user_id' => $this->user_id,
        ]);
        /*$this->reset('open','title','content','image'); */
        $this->longdescription ='';
        $this->reset(['name','slug','shortdescription','longdescription']);
       // $this->identificador = rand();
        //$this->emitTo('show-posts', 'render');
        //$this->emit('render');
        $this->emit('alert','El producto se creo correctament');
        return redirect()->route('showproductos');
    }



    public function updatedName($value){
        $this->slug = Str::slug($value);
    }





}
