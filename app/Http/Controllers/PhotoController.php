<?php

namespace App\Http\Controllers;

use Image;

use App\Models\User;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Support\Str;

//use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{


    public function edit(User $empresa)
    {

        return view('logo.edit', compact('empresa'));
    }



    public function update(User $empresa, Request $request)
    {

       // dd($empresa);

        $request->validate([
            'file'=>'required|image|max:2048'
        ]);

        if($empresa->logo){
            Storage::disk('s3')->delete([$empresa->logo]);
        }
        //codigo que dunciona en local


        $rs = Auth::user()->razonsocial;
        $aleatorio = Str::random(1);

        $nombre = Str::slug($rs." ".$aleatorio).".jpg";

        $ruta = 'storage/home/'. $nombre;

        $marcadeagua = Image::make($request->file('file'));

        $marcadeagua->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($ruta);
        //codigo que dunciona en local

        //para poner marca de agua
        /* $logo = storage_path().'\app\public\products/'. 'logo.png';
        $marcadeagua->insert($logo, 'bottom-right',5,5);
        $marcadeagua->save($ruta); */
        //para poner marca de agua

        $resource = $marcadeagua->stream()->detach();
        Storage::disk('s3')->put('home/'. $nombre, $resource,'public');



       // $logo = Storage::disk('s3')->put('home', $request->file('file') , 'public');

        $empresa->update([
            'logo' => 'home/'.$nombre
            //'logo' => $logo
        ]);


        //return redirect()->route('admin.product.index')->with('flash', 'Producto Creado con exito');
        return back()->with('flash', 'Logo Actualizado con exito');

    }



    public function store(Product $product, Request $request)
    {

    	$this->validate(request(), [
    		'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);


        // $url = Storage::disk('s3')->put('productos', $request->file('file') , 'public');
         //dd($url);
        //return "imagen cargada";
        //$nombre = $request->file('file')->getClientOriginalName();



       //codigo usando laravel intervention
        $empresa = Auth::user()->razonsocial;
        $aleatorio = Str::random(3);
        $nombre = Str::slug($product->name." ".$empresa." ".$aleatorio).".jpg";
       // $ruta = storage_path().'\app\public\products/'. $nombre;
        $ruta = 'storage/products/' . $nombre;;
        //codigo usando laravel intervention

        //$url = Storage::put('public/sliders', $request->file('image'));
        $marcadeagua = Image::make($request->file('file'));//lo guarda en la variable marca de agua
        $marcadeagua->resize(1200, 600, function ($constraint) {//redimenciona la imagen
                    $constraint->aspectRatio();
                });
        //$logo = storage_path().'\app\public\products/'. 'logo.png';//ubicamos el logo
        $logo = 'storage/products/'. 'logo.png';//ubicamos el logo
        $marcadeagua->insert($logo, 'bottom-right',5,5);//ponemos la marca de agua
        $marcadeagua->save($ruta);//gravamos la imagen en la ruta

        $resource = $marcadeagua->stream()->detach();
        Storage::disk('s3')->put('productos/'. $nombre, $resource,'public');






    	////$photo = $request->file('file')->store('public/products');
        //return $photo;
        //$photo  tiene el valor de: public/dffffffffjhsahasgk.jpg
        //si quieres mostrar la imagen con esta ruta da error
        //$photoUrl = $photo->store('public');
        //$photoUrl  tiene el valor de: public/dffffffffjhsahasgk.jpg
        //si quieres mostrar la imagen con esta ruta da error
        //le aplicamos: php artisan storage:link
        //storage link hace que sea publico la carpeta storage

       //$photoUrl = Storge::url($photo);
       //$photoUrl  tiene el valor de: /storage/dffffffffjhsahasgk.jpg
       //en la tabla guardamos esta ruta /storage/dffffffffjhsahasgk.jpg
       //para mostrar la imagen debemos llamar a esta ruta
        //return request()->file('photo')->store('posts','public');

       /* $post->photos()->create([

            'url' => request()->file('photo')->store('posts','public'),
        ]);
        */

    	Photo::create([
    	   	//'url' => Storage::url($nombre),
            'url'=>'productos/'.$nombre,
            ///'url'=>$url,
            //    'url' =>request()->file('photo')->store('public'),
            //    'url' => request()->file('photo')->store('posts','public');
    		'product_id' => $product->id

    	]);
    }



      public function destroy(Photo $photo)
      {
         $var= Storage::disk('s3')->delete($photo->url);
         //dd($var);
          $photo->delete();

          /*Storage::disk('public')->delete($photo->url);*/

          //$photoPath = str_replace('storage','public',$photo->url);
          //para eliminar cambiamos storage por public ya qye la imagen esta almacenada en
          //la carpeta public y no en la ca´peta storage
          //Storage::delete($photoPath);

          return back()->with('flash','Imagen Eliminado');

      }


}
