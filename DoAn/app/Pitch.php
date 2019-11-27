<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    protected $fillable = [
        'user_id',	'img','area','address',
    ];
    public $timestamps = false;

    public  function users(){
//        return $this->belongsTo(User::class);
        return $this->belongsTo(User::class,'user_id','id');
    }
}
