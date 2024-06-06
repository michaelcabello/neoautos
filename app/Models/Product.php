<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Photo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const PRODUCTO = 1;
    const SERVICIO = 2;

    const SOLES = 1;
    const DOLARES = 2;
    const EUROS = 3;

    const NUEVO = 1;
    const USADO = 2;

    const AUTOMATICA = 1;
    const MECANICA = 2;

    public function getRouteKeyName()
    {
        return 'slug';
    }




    //de uno a muchos
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    //Relacion uno a muchos inversa
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tipoo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    //Relacion uno a muchos inversa
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    //Relacion uno a muchos inversa




}
