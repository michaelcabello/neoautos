<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ListaProductosusados extends Component
{

    use WithPagination;

    public $view = "grid";

    public $items, $brands, $marca, $precio, $ano, $kilometraje;

    protected $queryString = ['marca'];


    public function mount(Item $items)
    {

        // $this->identificador=rand();
        $this->items = $items;
    }


    public function updatedMarca()
    {
        $this->resetPage();
    }

    public function render()
    {

        $this->brands = Brand::all();

        //2 es usado , 1 es nuevo
        $productsQuery = Product::where('state', 1)->where('newused', 2)->where('item_id', $this->items->id);
        //dd($productsQuery);


        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function (Builder $query) {
                $query->where('name', $this->marca);
            });
        }


        if ($this->precio) {
            // Divide el rango de precios seleccionado
            $priceRange = explode('-', $this->precio);
            $minPrice = (float) $priceRange[0]; // Convertir a float si el precio puede tener decimales
            $maxPrice = (float) $priceRange[1]; // Convertir a float si el precio puede tener decimales

            // Filtra los productos dentro del rango de precios
            $productsQuery = $productsQuery->where('priceoffer', '>=', $minPrice)
                ->where('priceoffer', '<=', $maxPrice);
        }


        if ($this->ano) {
            // Divide el rango de años seleccionado
            $yearRange = explode('-', $this->ano);
            $startYear = (int) $yearRange[0];
            $endYear = (int) $yearRange[1];

            // Filtra los productos dentro del rango de años por el nombre del año
            $productsQuery = $productsQuery->whereHas('year', function (Builder $query) use ($startYear, $endYear) {
                $query->where('name', '>=', $startYear)
                      ->where('name', '<=', $endYear);
            });
        }


        if ($this->kilometraje) {

            // Divide el rango de kilometraje seleccionado
            $kilometrajeRange = explode('-', $this->kilometraje);
            $minkilometraje = (int) $kilometrajeRange[0]; // Convertir a float si el precio puede tener decimales
            $maxkilometraje = (int) $kilometrajeRange[1]; // Convertir a float si el precio puede tener decimales
            //dd($maxkilometraje);
            // Filtra los productos dentro del rango de Kilometraje
            $productsQuery = $productsQuery->where('kilometraje', '>=', $minkilometraje)
                ->where('kilometraje', '<=', $maxkilometraje);
        }



        $products = $productsQuery->paginate(20);

       // dd($products);

        return view('livewire.lista-productosusados', compact('products'));
    }
}
