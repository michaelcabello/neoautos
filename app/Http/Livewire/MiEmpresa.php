<?php

namespace App\Http\Livewire;

use file;
use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use App\Models\Distrito;
use App\Models\Provincia;
use Illuminate\Support\Str;
//use Intervention\Image\Image;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Rule;
//use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

class MiEmpresa extends Component
{
    use WithFileUploads;
    public $razonsocial, $facebook, $youtube, $twitter, $instagram, $web, $email2;
    public $slug, $ruc, $phone, $movil, $whatsapp;
    public $aboutus, $vision, $mission, $address, $empresa;
    //public $categories;
    public $departamentos, $provincias = [], $distritos = [];
    public $title, $description, $keywords;
    public $coordenadas, $categories;
    public $identificador;
    //public $categoriess;
    //public $logo, $identificador;//coemntando porqie genera imagenes con nombre aleatorio

    public $departamento_id = "", $provincia_id = "", $distrito_id = "";


    public function mount()
    {
        $this->identificador = rand();

        $this->empresa = User::findOrFail(Auth::user()->id);

        // $this->empresa = new User();
        //echo gettype($this->empresa);
        // $this->empresa = Auth::user();

        $this->razonsocial = $this->empresa->razonsocial;
        // $this->slug = $this->empresa->slug;
        //$this->logo = $this->empresa->logo;
        $this->facebook = $this->empresa->facebook;
        $this->youtube = $this->empresa->youtube;
        $this->twitter = $this->empresa->twitter;
        $this->instagram = $this->empresa->instagram;
        $this->web = $this->empresa->web;
        $this->email2 = $this->empresa->email2;
        $this->ruc = $this->empresa->ruc;
        $this->phone = $this->empresa->phone;
        $this->movil = $this->empresa->movil;
        $this->whatsapp = $this->empresa->whatsapp;
        $this->aboutus = $this->empresa->aboutus;
        $this->vision = $this->empresa->vision;
        $this->mission = $this->empresa->mission;
        $this->address = $this->empresa->address;
        $this->coordenadas = $this->empresa->coordenadas;
        $this->title = $this->empresa->title;
        $this->description = $this->empresa->description;
        $this->keywords = $this->empresa->keywords;
        $this->categories = Category::all();
        $this->departamento_id = $this->empresa->departamento_id;
        $this->provincia_id = $this->empresa->provincia_id;
        $this->distrito_id = $this->empresa->distrito_id;

        $this->departamentos = Departamento::all();
        $this->provincias = Provincia::where('departamento_id', $this->departamento_id)->get();
        $this->distritos = Distrito::where('provincia_id', $this->provincia_id)->get();

        // $this->provincias = Provincia::all();
        // $this->distritos = Distrito::all();

    }


    protected $rules = [
        'razonsocial' => 'required',
        'web' => 'nullable|regex:[http://]',
        'facebook' => 'nullable|regex:[https://]',
        'twitter' => 'nullable|regex:[https://]',
        'instagram' => 'nullable|regex:[https://]',
        'youtube' => 'nullable|regex:[https://]',
        // 'slug'=> 'required',
        'ruc' => 'min:8',
        //'logo' => 'image'
        //'description'=>'required|min:1',
    ];


    public function updatedDepartamentoId($value)
    {
        $this->provincias = Provincia::where('departamento_id', $value)->get();

        $this->reset(['provincia_id', 'distrito_id']);
    }



    public function updatedProvinciaId($value)
    {

        //$city = Provincia::find($value);
        //$this->provincias = Provincia::find($value);

        $this->distritos = Distrito::where('provincia_id', $value)->get();

        $this->reset('distrito_id');
    }


    public function updatedRazonsocial($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save(Request $request)
    {

        //dd(Input::file('logo'));
        /* $this->rules['category.slug'] = 'required|unique:categories,slug,'.$this->category->id;  */
        //dd(storage_path().'\app\public/'.$request->user()->logo);

        $rules = $this->rules;



        /*        if($this->logo){
             $rules['logo'] ='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
             $this->validate($rules);

             if($this->empresa->logo){
                 Storage::disk('s3')->delete([$this->empresa->logo]);
             } */

        /* $empresa = Auth::user()->razonsocial;
             $aleatorio = Str::random(3);
             $nombre = Str::slug($empresa." ".$aleatorio).".jpg";
             $ruta = storage_path().'\app\public\home/'. $nombre; */
        //dd($ruta);

        /*  $marcadeagua = Image::make($request->user()->logo)
                    ->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
             })->save($ruta);

             $resource = $marcadeagua->stream()->detach();
             Storage::disk('s3')->put('home/'. $nombre, $resource,'public');
             $logo1 = 'home/'.$nombre; */


        /*              $logo1 = Storage::disk('s3')->put('home', $this->logo , 'public');
         }else{
            // dd($this->image);
            $logo1 = $this->empresa->logo;//no hay cambios en el logo
             $this->validate($rules);
         } */


        /*  $rules['razonsocial'] = 'required|unique:users,razonsocial,'.$this->empresa->id; */
        $rules['razonsocial'] = 'required|unique:users,razonsocial,' . $this->empresa->id;
        // $this->rules['slug'] = 'required|unique:users,slug,'.$this->empresa->id;
        /* $rules['slug'] = 'required|unique:users,slug,'.$this->empresa->id; */

        $this->validate($rules);
        //$this->validate();
        /*  $this->empresa->save(); */
        // return 8;
        //return $this->empresa;
        // dd($this->categoriess);

        $this->empresa->update([
            //'logo' => $logo1,
            //'logo'=>'home/'.$nombre,
            'razonsocial' => $this->razonsocial,
            // 'slug' => $this->slug,
            //'description' => $this->description,
            'facebook' => $this->facebook,
            'youtube' => $this->youtube,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'web' => $this->web,
            'email2' => $this->email2,
            'ruc' => $this->ruc,
            'phone' => $this->phone,
            'movil' => $this->movil,
            'whatsapp' => $this->whatsapp,

            'aboutus' => $this->aboutus,
            'vision' => $this->vision,
            'mission' => $this->mission,
            'address' => $this->address,
            'coordenadas' => $this->coordenadas,

            'title' => $this->title,
            'description' => $this->description,
            'keywords' => $this->keywords,

            'departamento_id' => $this->departamento_id,
            'provincia_id' => $this->provincia_id,
            'distrito_id' => $this->distrito_id,

        ]);

        //$this->empresa->syncCategories($request->get('categoriess'));
        // $this->empresa->categories()->attach($this->categoriess);



        // $this->reset('image');
        //$this->identificador = rand();
        // $this->emitTo('show-posts', 'render');
        //$this->reset(['razonsocial','slug','description']);
        $this->emit('alert', 'Los datos de tu Empresa se actualizaron correctamente');
        // return redirect()->route('admin.categories.index');


    }





    public function render()
    {
        return view('livewire.mi-empresa');
    }
}
