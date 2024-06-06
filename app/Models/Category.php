<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $withCount = ['business'];



    public function getRouteKeyName()
    {
    	return 'slug';
    }


    //Relacion muchos a muchos
    public function business(){
        return $this->belongsToMany('App\Models\User');
    }


}
