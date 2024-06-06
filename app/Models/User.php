<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $guarded = ['id'];

/*     protected $fillable = [
        'name',
        'email',
        'password',
        'razonsocial',
        'slug',
        'description',
        'external_provider',
        'external_id',
        'state'
    ]; */


    public function getRouteKeyName()
    {
    	return 'slug';
    }


    public function setRazonsocialAttribute($razonsocial)
    {
        $this->attributes['razonsocial'] = $razonsocial;
        $this->attributes['slug'] = str::slug($razonsocial);
        $this->attributes['state'] = 1;

    }

    public function getRazonsocialAttribute($razonsocial)
    {
        return  strtoupper($razonsocial);
    }


 /*    protected function razonsocial(): Attribute
    { */

       /*  return new Attribute(
            get: fn($value)=>strtoupper($value),
            set: fn($value)=>strtoupper($value),
        );
         */


       /*  return new Attribute(
            get: function($value){
                return strtoupper($value);
            },

            set: function($value){
                return strtoupper($value);
            }
        ); */
 /*    } */


    public function syncCategories($categories)
    {

        $categoryIds = collect($categories)->map(function($category){
            return Category::find($category) ? $category : Category::create(['name'=>$category])->id;
        });

        return $this->categories()->sync($categoryIds);
    }



    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];




    //Relacion uno a muchos
    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public function sliderclientes(){
        return $this->hasMany(Slidercliente::class);
    }


    //Relacion muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }





}
