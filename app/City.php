<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name'];

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name');


    public function clients()
    {
        return $this->hasMany(Client::class);

    }

}
