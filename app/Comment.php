<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name','email','comment','user_id','phone_no',
    ];
    public function user()
    {
        $this->belongsTo('App\User');
    }
}
