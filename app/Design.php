<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id','design_img','user_id'
    ];
    public function category(){

        return $this->belongsTo('App\Category');
    }
    public function user()
    {
       return $this->belongsTo(User::class);
     }

}
