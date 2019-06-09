<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $guarded = [];

    protected $casts = [
        'phone' => 'array',
        'ardy' => 'array'
    ];
    protected $fillable = array( 'name', 'phone' ,'ardy', 'address','org','id_number','date','re_number','post_code','email','password','client_id');

    public function clients()
   {
       return $this->belongsTo(Client::class,'client_id');
   }
}
