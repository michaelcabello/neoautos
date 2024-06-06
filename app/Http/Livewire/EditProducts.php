<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class EditProducts extends Component
{

    use WithFileUploads; 
    public $product;
    public $name, $slug, $shortdescription,$longdescription,$order,$title,$description,$keywords,$state;

    public function mount(Product $product){
        $activado = 1;
        $desactivado = 0;
        //$this->product = $product;
       // $this->identificador=rand();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->shortdescription = $product->shortdescription;
        $this->longdescription = $product->longdescription;
        $this->order = $product->order;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->keywords = $product->keywords;
        $this->state = $product->state;
       
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }


    protected $rules = [
        'name'=> 'required|unique:products,name',
        'slug'=> 'required',
        'shortdescription'=>'required|min:3',
        'longdescription'=>'required|min:3',
        'order'=> 'min:1',
        'title'=> 'min:2',
        'description'=> 'min:5',
        'keywords'=> 'min:5',  
        'state'=> 'required',
    ];  


    public function save(){

        /* $this->rules['product.slug'] = 'required|unique:products,slug,'.$this->product->id; */
        $this->rules['name'] = 'required|unique:products,name,'.$this->product->id;
        $this->rules['slug'] = 'required|unique:products,slug,'.$this->product->id;
        $this->validate();

/*         if($this->image){
            Storage::delete([$this->product->image]);
            $this->product->image = $this->image->store('products', 'public');
        } */

       /*  $this->product->save();*/
       
        $this->product->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'shortdescription' => $this->shortdescription,
            'longdescription' => $this->longdescription,
            'order' => $this->order,
            'title' => $this->title,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'state' => $this->state
        ]);

       // $this->reset('image');
        //$this->identificador = rand();
       // $this->emitTo('show-posts', 'render');
       $this->reset(['name','slug','shortdescription','longdescription']);
       $this->emit('alert','El Producto se actualizo correctament');
       return redirect()->route('showproductos');


    }   






    public function render()
    {
        return view('livewire.edit-products');
    }
}
