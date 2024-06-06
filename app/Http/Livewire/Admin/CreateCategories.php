<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CreateCategories extends Component
{
    use WithFileUploads; 
    public $longdescription, $name, $shortdescription, $order, $state, $slug, $image, $identificador, $title, $description, $keywords;
    
    public function mount(){
        $this->identificador=rand();
    }

    public function render()
    {
        return view('livewire.admin.create-categories')->layout('layouts.admin');
    }


    public function updatedName($value){
        $this->slug = Str::slug($value);
    }


    protected $rules = [
        'name'=> 'required',
        'slug'=> 'required|unique:categories,slug',
        'shortdescription'=>'required|min:3',
        'longdescription'=>'required|min:3',
        'title'=> 'max:5',
        'description'=> 'max:10',
        'keywords'=> 'max:5',
    ];


    public function save(){
        $this->validate();
        //$url = Storage::disk('s3')->put('public/posts', $request->file('file'), 'public');
        if($this->image){
            //$image = $this->image->store('categories', 'public');
            $image = Storage::disk('s3')->put('categories', $this->image, 'public');
        }else{
            $image = 'categories/default.jpg';
        }


        if ($this->state == true) {
            $status = 1;
        }else{
            $status = 0;
        }



        Category::create([
            'name' => Str::title($this->name),
            'slug' => $this->slug,
            'shortdescription' => $this->shortdescription,
            'longdescription' => $this->longdescription,
            'order' => $this->order,
            'image' => $image,
            'state' => $status,
            'title' => $this->title
        ]);
        /*$this->reset('open','title','content','image'); */
        $this->longdescription ='';
        $this->reset(['name','slug','shortdescription','longdescription', 'image']);
       // $this->identificador = rand();
        //$this->emitTo('show-posts', 'render');
        //$this->emit('render');
        $this->emit('alert','La Categoria se creo correctament');
        return redirect()->route('admin.categories.index');
    }


/*     public function updatedShortdescription($value){
        $this->description = $value;
    } */

    public function updated($propertyNameeer){
        $this->validateOnly($propertyNameeer);
    }


}
