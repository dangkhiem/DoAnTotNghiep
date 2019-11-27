<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpitch extends Model
{
    protected $fillable = [
        'pitch_id','shop_id','type','start_time','end_time','cost',
    ];
    public $timestamps = false;
}
