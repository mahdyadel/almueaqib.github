<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected $guarded = [];
   
    protected $table = 'records';
    public $timestamps = true;
    protected $fillable = array(  'name' , 'email','phone'  , 'web');


    
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');

    }


}
