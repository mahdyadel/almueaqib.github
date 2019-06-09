<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mang extends Model
{

    protected $guarded = [];
   
    protected $table = 'mangs';
    public $timestamps = true;
    protected $fillable = array( 'category_id', 'name' ,'fees', 'fee'  );


    public function categorios()
    {
        return $this->belongsTo(Category::class,'category_id');

    }

}
