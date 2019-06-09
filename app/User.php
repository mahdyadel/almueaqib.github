<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $casts = [
        'mandoob' => 'array',
        'image_scan' => 'array',
    ];
    protected $fillable = [
        'name', 'email', 'password', 'image' , 'id_number','gender','status','job','Section',
        'birth_date','address','phone','phone2','mobile','mobile2','salary','start','end','image_scan','mandoob'
    ];

    protected $appends = ['image_path'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get first name

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get last name

    public function getImagePathAttribute()
    {
        return asset('uploads/user_images/' . $this->image);

    }
    //end of get image path
    public function getImageScanPathAttribute()
    {
        return asset('uploads/img_scan/' . $this->image_scan);

    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'categroy_user','user_id','categroy_id');

    }

    public function category()
    {
        return $this->belongsTo('App\Category','user_id');

    }

}//end of model
