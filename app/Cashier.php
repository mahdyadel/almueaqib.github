<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany('\Product');
    }
    public function sadads()
    {
        return $this->hasMany('\Sadad');
    }

}
