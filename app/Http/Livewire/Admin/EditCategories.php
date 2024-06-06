<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class EditCategories extends Component
{
    use WithFileUploads; 
    public $category;
    public $identificador, $image, $name, $slug, $shortdescription,$longdescription,$order,$title,$description,$keywords,$state;

    public function mount(Category $category){
        $activado = 1;
        $desactivado = 0;
        //$this->category = $category;
       // $this->identificador=rand();
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->shortdescription = $category->shortdescription;
        $this->longdescription = $category->longdescription;
        $this->order = $category->order;
        $this->title = $category->title;
        $this->description = $category->description;
        $this->keywords = $category->keywords;
        $this->state = $category->state;
       
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

/*     protected $rules = [
        'category.name'=> 'required',
        'category.slug'=> 'required',
        'category.shortdescription'=>'required|min:3',
        'category.longdescription'=>'required|min:3',
        'category.order'=> 'max:5',
        'category.title'=> 'max:5',
        'category.description'=> 'max:10',
        'category.keywords'=> 'max:5',  
        'category.state'=> 'required',
    ];   */

    protected $rules = [
        'name'=> 'required|unique:categories,name',
        'slug'=> 'required',
        'shortdescription'=>'required|min:3',
        'longdescription'=>'required|min:3',
        'order'=> 'max:5',
        'title'=> 'max:5',
        'description'=> 'max:10',
        'keywords'=> 'max:5',  
        'state'=> 'required',
    ];  



    public function save(){

        /* $this->rules['category.slug'] = 'required|unique:categories,slug,'.$this->category->id; */
        $this->rules['name'] = 'required|unique:categories,name,'.$this->category->id;
        $this->rules['slug'] = 'required|unique:categories,slug,'.$this->category->id;
        $this->validate();

        if($this->image){
            Storage::delete([$this->category->image]);
            $this->category->image = $this->image->store('categories', 'public');
        }

       /*  $this->category->save();*/
       
        $this->category->update([
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
       $this->reset(['name','slug','shortdescription','longdescription', 'image']);
       $this->emit('alert','La Categoria se actualizo correctament');
       return redirect()->route('admin.categories.index');


    }    



    public function render()
    {
        return view('livewire.admin.edit-categories')->layout('layouts.admin');
    }
}
