<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offec extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name'];   
   

    protected $table = 'offecs';
    public $timestamps = true;
    protected $fillable = array(  'city' , 'phone1','phone2' , 'mobile1' , 'mobile2' , 'category_id' , 'branch');


    public function clients()
    {
        return $this->hasMany(Client::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');

    }

}
