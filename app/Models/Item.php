<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;



    //Relacion uno a muchos
    public function products(){
        return $this->hasMany(Product::class);
    }


    public function getRouteKeyName()
    {
    	return 'slug';
    }

}




