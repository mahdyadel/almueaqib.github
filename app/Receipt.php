<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['type_of_transaction'];

    protected $table = 'receipts';
    public $timestamps = true;
    protected $fillable = array('commission' , 'ratio', 'about', 'client_id' , 'salary','type_of_transaction','Payment_method','bank_name','transfer_number','name', 'number','num_saned');

    public function products()
    {
        return $this->belongsTo(Product::class);

    }

    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');

    }

    

}
