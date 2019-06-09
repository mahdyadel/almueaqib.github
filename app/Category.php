<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use \Dimsav\Translatable\Translatable;

   // protected $guarded = [];
    //public $translatedAttributes = ['name'];
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function mangs()
    {
        return $this->hasMany(Mang::class);

    }//end of mangs

    public function offecs()
    {
        return $this->hasMany(Offec::class);

    }//end of offec
    public function users()
    {
        return $this->belongsToMany(User::class);

    }
    public function user()
    {
        return $this->hasMany(User::class);

    }
    public function sadads()
    {
        return $this->hasMany('\Sadad');
    }
}//end of model
