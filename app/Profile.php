<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['city', 'country', 'about', 'phone_no','user_id'];

    public function user()
    {
        $this->belongsTo('App\user');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
