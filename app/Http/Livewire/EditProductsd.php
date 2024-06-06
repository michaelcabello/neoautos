<?php

namespace App\Http\Livewire;

use App\Models\Item;

use App\Models\Tipo;
use App\Models\Year;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Models\Departamento;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditProductsd extends Component
{

    use WithFileUploads;
    public $product;
    public $name, $slug, $shortdescription, $longdescription, $order, $title, $description, $keywords, $video, $state, $codigoreferencia, $placa;
    public $items, $years, $colors, $item_id = "", $brand_id = "", $color_id = "", $year_id = "", $typecurrency, $price, $priceoffer, $newused, $datasheet, $datasheetback, $stock;
    public $tipo_id = ""; //es el modelo
    public $subcategory_id;
    public $departamentos, $provincias = [], $distritos = [];
    public $departamento_id = "", $provincia_id = "", $distrito_id = "";
    public $tipos, $year_name, $yearmodelo = "";
    public $subcategories;
    public $version, $transmision = "", $combustible = "", $motor = "", $kilometraje = "", $numpuertas = "", $traccion = "", $cilindrada = "";
    public $retrovisoreselectricos, $neblineros, $aireacondicionado, $fullequipo, $computadoradeabordo, $parlantesbajos, $radiocd, $radiomp3;
    public $aros, $arosdealeacion, $parrilla, $luceshalogenas, $localizadorgps, $airbag, $laminasdeseguridad, $blindado, $farosantiniebladelantero;
    public $farosantinieblatraseros, $inmovilizadordemotor, $repartidorelectronicodefrenado, $frenosabs, $alarma, $sunroof, $asientosdecuero, $climatizador;


    public function mount(Product $product)
    {
        $activado = 1;
        $desactivado = 0;
        //$this->product = $product;
        // $this->identificador=rand();
        $this->items = Item::all();
        $this->years = Year::all();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->version = $product->version;
        $this->codigoreferencia = $product->codigoreferencia;
        $this->placa = $product->placa;


        if ($product->transmision == NULL)
            $this->transmision = "";
        else
            $this->transmision = $product->transmision;

        if ($product->combustible == NULL)
            $this->combustible = "";
        else
            $this->combustible = $product->combustible;


        if ($product->motor == NULL)
            $this->motor = "";
        else
            $this->motor = $product->motor;

        if ($product->kilometraje == NULL)
            $this->kilometraje = "";
        else
            $this->kilometraje = $product->kilometraje;


        if ($product->numpuertas == NULL)
            $this->numpuertas = "";
        else
            $this->numpuertas = $product->numpuertas;

        if ($product->traccion == NULL)
            $this->traccion = "";
        else
            $this->traccion = $product->traccion;


        $this->colors = Color::all();
        $this->years = Year::all();


        if ($product->cilindrada == NULL)
            $this->cilindrada = "";
        else
            $this->cilindrada = $product->cilindrada;


        $this->video = $this->product->video;

        $this->departamento_id = $this->product->departamento_id;
        $this->provincia_id = $this->product->provincia_id;
        $this->distrito_id = $this->product->distrito_id;


        $this->departamentos = Departamento::all();
        $this->provincias = Provincia::where('departamento_id', $this->departamento_id)->get();
        $this->distritos = Distrito::where('provincia_id', $this->provincia_id)->get();





        $this->shortdescription = $product->shortdescription;
        $this->longdescription = $product->longdescription;
        $this->order = $product->order;
        $this->title = $product->title;
        $this->description = $product->description;
        $this->keywords = $product->keywords;
        $this->state = $product->state;
        $this->retrovisoreselectricos = $product->retrovisoreselectricos;
        $this->neblineros = $product->neblineros;
        $this->aireacondicionado = $product->aireacondicionado;
        $this->fullequipo = $product->fullequipo;
        $this->computadoradeabordo = $product->computadoradeabordo;
        $this->parlantesbajos = $product->parlantesbajos;
        $this->radiocd = $product->radiocd;
        $this->radiomp3 = $product->radiomp3;
        $this->aros = $product->aros;
        $this->arosdealeacion = $product->arosdealeacion;
        $this->parrilla = $product->parrilla;
        $this->luceshalogenas = $product->luceshalogenas;
        $this->localizadorgps = $product->localizadorgps;
        $this->airbag = $product->airbag;
        $this->laminasdeseguridad = $product->laminasdeseguridad;
        $this->blindado = $product->blindado;
        $this->farosantiniebladelantero = $product->farosantiniebladelantero;
        $this->farosantinieblatraseros = $product->farosantinieblatraseros;
        $this->inmovilizadordemotor = $product->inmovilizadordemotor;
        $this->repartidorelectronicodefrenado = $product->repartidorelectronicodefrenado;
        $this->frenosabs = $product->frenosabs;
        $this->alarma = $product->alarma;
        $this->sunroof = $product->sunroof;
        $this->asientosdecuero = $product->asientosdecuero;
        $this->climatizador = $product->climatizador;


        if ($product->item_id == NULL)
            $this->item_id = "";
        else
            $this->item_id = $product->item_id;

        if ($product->brand_id == NULL)
            $this->brand_id = "";
        else
            $this->brand_id = $product->brand_id;


        if ($product->tipo_id == NULL)
            $this->tipo_id = "";
        else
            $this->tipo_id = $product->tipo_id;

        if ($product->subcategory_id == NULL)
            $this->subcategory_id = "";
        else
            $this->subcategory_id = $product->subcategory_id;


        if ($product->color_id == NULL)
            $this->color_id = "";
        else
            $this->color_id = $product->color_id;


        if ($product->year_id == NULL)
            $this->year_id = "";
        else
            $this->year_id = $product->year_id;



        if ($product->yearmodelo == NULL)
            $this->yearmodelo = "";
        else
            $this->yearmodelo = $product->yearmodelo;



        $this->tipos = Tipo::where('brand_id', $this->brand_id)->get();
        $this->subcategories = Subcategory::where('item_id', $this->item_id)->get();

        $yearsellect = Year::find($this->year_id);
        if ($yearsellect)
            $this->year_name = $yearsellect->name;


        $this->typecurrency = $product->typecurrency;
        $this->price = $product->price;
        $this->priceoffer = $product->priceoffer;
        $this->newused = $product->newused;
        // $this->datasheet = $product->datasheet;
        $this->datasheetback = $product->datasheet;
        $this->stock = $product->stock;
        $this->order = $product->order;
    }




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



    public function updatedName($value)
    {
        //$this->slug = Str::slug($value);
        if (Auth::user()->razonsocial) {
            $slug = $value . " " . Auth::user()->razonsocial . " " . Str::random(3);
        } else {
            $slug = $value . " " . Auth::user()->name . " " . Str::random(3);
        }

        $this->slug = Str::slug($slug);
    }


    protected $rules = [
        'name' => 'required',
        //'slug' => 'required',
        //'shortdescription' => 'required|min:3',
        //'longdescription' => 'required|min:3',
        //'order'=> 'min:1',
        //'title'=> 'min:2',
        //'description'=> 'min:5',

        //'keywords' => 'min:5',
        //'state' => 'required',
        //'item_id' => 'required',
        //'stock' => '',
    ];


    public function updatedItemId($value)
    {
        $this->subcategories = Subcategory::where('item_id', $value)->get();
        //dd($this->tipos);
        /* $this->reset(['subcategory_id', 'brand_id']); */
        $this->product->subcategory_id = "";
    }


    public function updatedBrandId($value)
    {
        $this->tipos = Tipo::where('brand_id', $value)->get();
        //dd($this->tipos);
        /* $this->reset(['subcategory_id', 'brand_id']); */
        $this->product->tipo_id = "";
    }





    public function updatedYearId($value)
    {
        //$yearsellect = Tipo::where('brand_id', $value)->get();
        $yearsellect = Year::find($value);
        if ($yearsellect)
            $this->year_name = $yearsellect->name;
    }



    public function save()
    {

        //dd($this->yearmodelo);

        /* $this->rules['product.slug'] = 'required|unique:products,slug,'.$this->product->id; */
        // $this->rules['name'] = 'required|unique:products,name,'.$this->product->id;
        $this->rules['slug'] = 'required|unique:products,slug,' . $this->product->id;

        if ($this->datasheet) {
            $rules['datasheet'] = 'max:2048';
            $this->validate($rules);
            //Storage::delete([$this->product->brochure]);
            //$brochure = $this->brochure->store('brochureproducts', 'public');
            //$urlbrochure = Storage::url($brochure);
            //Storage::disk('s3')->delete([$this->product->datasheet]);
            $urldatasheet = Storage::disk('s3')->put('brochureproducts', $this->datasheet, 'public');
        } else {
            $this->validate();
            $urldatasheet = $this->datasheetback;
        }

        $this->validate();
        /*         if($this->image){
            Storage::delete([$this->product->image]);
            $this->product->image = $this->image->store('products', 'public');
        } */

        /*  $this->product->save();*/

        $this->product->update([
            'name' => $this->name,
            'item_id' => empty($this->item_id) ? NULL : $this->item_id, //$this->item_id,
            'subcategory_id' => empty($this->subcategory_id) ? NULL : $this->subcategory_id, //$this->subcategory_id,
            'slug' => $this->slug,
            'typecurrency' => $this->typecurrency,
            'price' => $this->price,
            //'priceoffer' => $this->priceoffer,
            'newused' => $this->newused,
            'transmision' => $this->transmision,
            'combustible' => $this->combustible,
            'motor' => $this->motor,
            'kilometraje' => $this->kilometraje,
            'numpuertas' => $this->numpuertas,
            'traccion' => $this->traccion,
            'color_id' => empty($this->color_id) ? NULL : $this->color_id,//$this->color_id,
            'cilindrada' => $this->cilindrada,
            'codigoreferencia' => $this->codigoreferencia,
            'placa' => $this->placa,
            'video' => $this->video,
            'retrovisoreselectricos' => $this->retrovisoreselectricos,
            'neblineros' => $this->neblineros,
            'aireacondicionado' => $this->aireacondicionado,
            'fullequipo' => $this->fullequipo,
            'computadoradeabordo' => $this->computadoradeabordo,
            'parlantesbajos' => $this->parlantesbajos,
            'radiocd' => $this->radiocd,
            'radiomp3' => $this->radiomp3,
            'aros' => $this->aros,
            'arosdealeacion' => $this->arosdealeacion,
            'parrilla' => $this->parrilla,
            'luceshalogenas' => $this->luceshalogenas,
            'localizadorgps' => $this->localizadorgps,
            'airbag' => $this->airbag,
            'laminasdeseguridad' => $this->laminasdeseguridad,
            'blindado' => $this->blindado,
            'farosantiniebladelantero' => $this->farosantiniebladelantero,
            'farosantinieblatraseros' => $this->farosantinieblatraseros,
            'inmovilizadordemotor' => $this->inmovilizadordemotor,
            'repartidorelectronicodefrenado' => $this->repartidorelectronicodefrenado,
            'frenosabs' => $this->frenosabs,
            'alarma' => $this->alarma,
            'sunroof' => $this->sunroof,
            'asientosdecuero' => $this->asientosdecuero,
            'climatizador' => $this->climatizador,

            'datasheet' => $urldatasheet,
            'stock' => $this->stock,
            'shortdescription' => $this->shortdescription,
            'longdescription' => $this->longdescription,
            'order' => $this->order,
            'state' => $this->state,
            'title' => $this->name,
            'description' => $this->shortdescription,
            'keywords' => $this->keywords,

            'brand_id' => empty($this->brand_id) ? NULL : $this->brand_id, //$this->brand_id
            'tipo_id' => empty($this->tipo_id) ? NULL : $this->tipo_id, //$this->tipo_id,
            'year_id' => empty($this->year_id) ? NULL : $this->year_id, //$this->year_id,
            'yearmodelo' => $this->yearmodelo,
            'version' => $this->version,

            'departamento_id' => $this->departamento_id,
            'provincia_id' => $this->provincia_id,
            'distrito_id' => $this->distrito_id
        ]);

        // $this->reset('image');
        //$this->identificador = rand();
        // $this->emitTo('show-posts', 'render');
        $this->reset(['name', 'slug', 'shortdescription', 'longdescription']);

        $this->emit('alert', 'El Registro se actualizo correctamente');
        return redirect()->route('showproductos');
        //$this->emit('alert','El registro se modifico correctamente');


    }



    public function render()
    {
        //dd($this->items);
        // return view('livewire.edit-productsd');
        $items = Item::all();
        $brands = Brand::all();
        $colors = Color::all();

        return view('livewire.edit-productsd', compact('items', 'brands', 'colors'));
    }
}
