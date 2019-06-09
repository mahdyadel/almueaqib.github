<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['name', 'description'];
    protected $appends = ['image_path', 'profit_percent'];
    protected $fillable = ['cashier_id','num_saned','number','category_id','client_id','type_of_transaction','fees','fee','other_fees','other_fee','status'];

    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/' . $this->image);

    }//end of image path attribute

    public function getProfitPercentAttribute()
    {
        $profit = $this->fess ;//- $this->purchase_price
        $profit_percent = $profit * 100 / $this->fees;
        return number_format($profit_percent, 1);

    }//end of get profit attribute


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
}//end of model
