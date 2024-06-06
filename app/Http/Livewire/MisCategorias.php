<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MisCategorias extends Component
{

    public $categories, $empresa, $user, $contador;

    public $editForm = [
        //'name' => null,
        'categories' => [],
    ];




    protected $validationAttributes = [

        'editForm.categories' => 'categorias'
    ];

    public function contadores(){
        //contador captura el numero de elementos
        $this->contador = count($this->editForm['categories']);
        if($this->contador > 5)
            $this->emit('alert','Sólo se permite 5 Categorias');
            //elimino el ultimo elemento
            unset($this->editForm['categories'][5]);
            //actualizo el valor del contador
            $this->contador = count($this->editForm['categories']);
            return;
    }


    public function getCategories(){
        $this->categories = Category::orderBy('name')->get();
        //$categories = Category::orderBy('name')->get();
    }

    public function mount(User $user){

        //dd($user);
        $user = Auth::user();
        $this->user = $user;
        //$this->empresa = Auth::user()->id;
        //$user = User::where('id', $this->empresa)->get();
        //dd($user);
        $this->getCategories();

        //$this->contador = count($this->editForm['categories']);
        $this->contador = $user->categories->count();



        //$this->editForm['name'] = $user->name;
        //dd($user->categories->pluck('id'));

        $this->editForm['categories'] = $user->categories->pluck('id');
        //dd($this->editForm['categories']);


        //$this->categories = Category::all();
        //dd($this->categories);

      //  $this->categoriess = $user->categories->pluck('id');
        //$this->editForm['brands'] = $category->brands->pluck('id');


    }



    public function render()
    {

       // return $categories;
        return view('livewire.mis-categorias');
    }

    public function update()
    {
       // $this->user->syncCategories($this->categories);

       if($this->contador > 5)
       {
        //return;
        $this->emit('alert','No se GRABO, Sólo se permite 5 Categorias');

       }else{
        //$this->category->brands()->sync($this->editForm['brands']);
        $this->user->categories()->sync($this->editForm['categories']);
        $this->getCategories();
        $this->emit('alert','Las Categorias fueron asignadas con éxito');
       }


    }
}
