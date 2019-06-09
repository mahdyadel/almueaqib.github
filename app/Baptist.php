<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptist extends Model
{

    protected $guarded = [];
   
    protected $table = 'baptists';
    public $timestamps = true;
    protected $fillable = array( 'num_saned', 'name1' ,'name2', 'phone1','phone2' , 'mobile1' , 'mobile2' , 'account1' , 'account2', 'bank1' ,'bank2');


    public function clients()
    {
        return $this->hasMany(Client::class);

    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');

    }

}
