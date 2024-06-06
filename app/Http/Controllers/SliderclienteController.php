<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Slidercliente;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Storage;

class SliderclienteController extends Controller
{

    public function index()
    {
        $sliders = Slidercliente::where('user_id', Auth::user()->id)->get();
        return view('sliderclientes.index', compact('sliders'));
    }


    public function create()
    {
        return view('sliderclientes.create');
    }


    public function store(Request $request)
    {

       // dd(auth()->id());


        $request->validate([
            'image'=>'image|max:2048',
            'title' => 'required',
        ]);

        $image = 'slider/default.jpg';//pone nombre por defecto

        //si se ingresa imagen
        if($request->file('image')){

            $rs = Auth::user()->razonsocial;
            $aleatorio = Str::random(1);

            $nombre = Str::slug($rs." ".$aleatorio).".jpg";

            //$ruta = storage_path().'\app\public\slider/'. $nombre;
            //no se necesita la ruta storage porque en el hosting nio funciona el storagelink
            $ruta = 'storage/slider/'. $nombre;

            $slider = Image::make($request->file('image'));

            $slider->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($ruta);

            $resource = $slider->stream()->detach();
            Storage::disk('s3')->put('slider/'. $nombre, $resource,'public');

            $image = 'slider/'.$nombre;

        }


        Slidercliente::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'order' => $request->get('order'),
            'state' => $request->get('state'),
            'image' => $image,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('sliderclientes.index')->with('flash', 'Slider Creado con exito');



    }


    public function show(Slidercliente $slidercliente)
    {
        //
    }


    public function edit(Slidercliente $slidercliente)
    {
        return view('sliderclientes.edit', compact('slidercliente'));
    }


    public function update(Request $request, Slidercliente $slidercliente)
    {
        $this->validate(request(), [
    		'title' => 'required',
            'image'=>'image',

    	]);


        $image = $slidercliente->image;//pone la imagen inicial

        //si se ingresa imagen
        if($request->file('image')){

            $rs = Auth::user()->razonsocial;
            $aleatorio = Str::random(1);

            $nombre = Str::slug($rs." ".$aleatorio).".jpg";

           // $ruta = storage_path().'\app\public\slider/'. $nombre;
           $ruta = 'storage/slider/'. $nombre;

            $slider = Image::make($request->file('image'));

            $slider->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($ruta);

            $resource = $slider->stream()->detach();
            Storage::disk('s3')->put('slider/'. $nombre, $resource,'public');

            $image = 'slider/'.$nombre;

        }



        $slidercliente->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'order' => $request->get('order'),
            'state' => $request->get('state'),
            'image' => $image,
            'user_id' => auth()->id()
        ]);


        return back()->with('flash', 'Slider Actualizado con exito');

    }


    public function destroy(Slidercliente $slidercliente)
    {
        $slidercliente->delete();
        //return redirect()->route('sliderclientes.index')->with('flash', 'Slider Eliminado con exito');
        return redirect()->route('sliderclientes.index')->with('eliminar', 'ok');
    }
}
