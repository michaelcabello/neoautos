<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class MisProductos extends Component
{


    use WithPagination;
    public $product, $state;
    public $search;
    public $sort='id';
    public $direction='desc';
    public $cant='10';


    protected $queryString = [
        'cant'=>['except'=>'10'],
        'sort'=>['except'=>'id'],
        'direction'=>['except'=>'desc'],
        'search'=>['except'=>''],
    ];


    public function mount(){
        $this->product = new Product();
    }


    public function updatingSearch(){
        $this->resetPage();
        //RESETEA la paginación,
    }


   /*  protected $rules = [
        'state'=>'',
     ]; */


    public function activar(Product $productt){
        $this->product = $productt;
        //dd($productt);
        $this->product->update([
            'state' => 1
        ]);
    }

    public function desactivar(Product $productt){
        $this->product = $productt;
        //dd($productt);
        $this->product->update([
            'state' => 0
        ]);
    }


    public function order($sort){
        if($this->sort == $sort){
            if($this->direction == 'desc'){
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }

    }


    public function render()
    {

        $id = Auth::user()->id;
       /*  $products = Product::where('user_id', $id)->paginate(4);
        return view('livewire.mis-productos', compact('products')); */



        $products = Product::where('name', 'like', '%' .$this->search. '%')
            ->where('user_id', $id)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);


        return view('livewire.mis-productos', compact('products'));



    }
}
