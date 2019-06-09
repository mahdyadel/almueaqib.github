<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];
    protected $table = 'clients';

    protected $casts = [
        'phone' => 'array',
        'ardy' => 'array'

    ];

    public function products()
    {
        return $this->hasMany('\Product');
    }
    public function orders()
    {
        return $this->hasMany('\Order');
    }
    public function cities()
    {
        return $this->belongsTo(City::class);

    }
    public function receipts()
    {
        return $this->hasMany('\Receipt');
    }
    public function catchs()
    {
        return $this->hasMany('\Catchs');
    }
    public function workers()
    {
        return $this->hasMany('\Worker','client_id');
    }
    public function sadads()
    {
        return $this->hasMany('\Sadad');
    }

}//end of model
