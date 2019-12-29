<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpitch extends Model
{
    protected $fillable = [
        'pitch_id','type','name'
    ];
    public $timestamps = true;
}
