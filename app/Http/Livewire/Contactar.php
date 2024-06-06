<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Solicitud;


class Contactar extends Component
{

    public $name, $email, $movil, $description, $date, $product_id, $user_id;




    public function mount(Product $product){
        $this->product_id = $product->id;
        $this->user_id = $product->user->id;
    }



    protected $rules = [
        'name'=> 'required',
        'email'=> 'required|email',
        'movil'=>'required|min:7',
        'description'=>'required|min:3',
        /* 'g-recaptcha-response'=> 'required|captcha', */
        //'date'=> 'required',
    ];





    public function save(){
        $this->validate();
        $solicitud = Solicitud::create([
            'name' => $this->name,
            'email' => $this->email,
            'movil' => $this->movil,
            'description' => $this->description,
            'state' => true,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,

        ]);

        $this->reset(['name','email','movil', 'description']);

        /*$this->reset('open','title','content','image'); */
        // $this->reset(['open','title','content','image']);

       // $this->emitTo('show-posts', 'render');
        //$this->emit('render');
        $this->emit('alert','El mensaje se envío correctamente');
        //return redirect()->route('products.editd', $product);
    }






    public function render()
    {
        return view('livewire.contactar');
    }
}
