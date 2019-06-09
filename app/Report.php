<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $guarded = [];
   
    protected $table = 'reports';
    public $timestamps = true;
    protected $fillable = array(  'name' ,'number', 'statement','numb' , 'status' , 'reason');


    public function clients()
    {
        return $this->hasMany(Client::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');

    }

}
