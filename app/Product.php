<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['user_id','name','price','description','category_id','image'];
    public function category(){

        return $this->belongsTo('App\Category');
    }
    public function user()
    {
       return $this->belongsTo(user::class);
     }

}
