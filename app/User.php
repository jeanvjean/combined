<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username','email', 'password', 'slug', 'sex', 'img','account_type','website','work_email','phone_no','city'
        ,'country','about','brand'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
  public function isRole(){
    return $this->role; // mysql table column
  }
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }
    public function product()
    {
        return $this->hasMany('App\Product');
    }
    public function design()
    {
        return $this->hasMany('App\Design');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
