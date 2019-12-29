<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pitch extends Model
{
    protected $fillable = [
        'user_id','name','img','area','address', 'open_time', 'close_time'
    ];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
