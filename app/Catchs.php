<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catchs extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['type_of_transaction'];

    protected $table = 'catchs';
    public $timestamps = true;
    protected $fillable = array('commission' , 'ratio' , 'salary','type_of_transaction','Payment_method','dareba' ,'client_id','about','num_saned');



    public function products()
    {
        return $this->belongsTo(Product::class);

    }
    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');

    }


}
