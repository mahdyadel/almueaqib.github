<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sadad extends Model
{
    protected $guarded = [];
    protected $fillable = ['cashier_id','num_saned','number','category_id','client_id','type_of_transaction','fees','status'];

    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/' . $this->image);

    }//end of image path attribute



    public function category()
    {
        return $this->belongsTo(Category::class);

    }//end fo category

    public function clients()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function cashiers()
    {
        return $this->belongsTo(Cashier::class,'cashier_id');
    }
}
