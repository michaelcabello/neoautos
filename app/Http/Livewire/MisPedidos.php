<?php

namespace App\Http\Livewire;

use App\Models\Solicitud;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class MisPedidos extends Component
{


    use WithPagination;
    public $name, $email, $movil, $description, $state, $product, $date;
    public $open_show = false;
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
       // $this->solicitud = new Solicitud();
    }


    public function updatingSearch(){
        $this->resetPage();
        //RESETEA la paginación,
    }


   /*  protected $rules = [
        'state'=>'',
     ]; */


    public function activar(Solicitud $pedido){
        $this->solicitud = $pedido;
        //dd($productt);
        $this->solicitud->update([
            'state' => 1
        ]);
    }

    public function desactivar(Solicitud $pedido){
        $this->solicitud = $pedido;
        //dd($productt);
        $this->solicitud->update([
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

    public function show(Solicitud $solicitud){
        $this->open_show = true;
        $this->name = $solicitud->name;
        $this->email = $solicitud->email;
        $this->movil = $solicitud->movil;
        $this->description = $solicitud->description;

        if(isset($solicitud->product->name))
         $this->product = $solicitud->product->name;
        else
         $this->product = "";
        $this->date = $solicitud->date;




    }

    public function cancelar(){
        $this->reset('open_show','name', 'email', 'movil', 'description', 'product', 'date');

    }

    public function render()
    {

        $id = Auth::user()->id;
       /*  $products = Product::where('user_id', $id)->paginate(4);
        return view('livewire.mis-productos', compact('products')); */



        $solicitudes = Solicitud::where('name', 'like', '%' .$this->search. '%')
            ->where('user_id', $id)
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);


        return view('livewire.mis-pedidos', compact('solicitudes'));



    }



}
