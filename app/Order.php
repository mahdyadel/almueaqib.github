<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];
   
    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array(  'name' ,'type', 'number','fees' , 'fee','client_id' );


    
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');

    }


}
