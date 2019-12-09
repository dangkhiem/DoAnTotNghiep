<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpitchdetail extends Model
{
    protected $fillable = [
        'pitch_id','type','start_time','end_time','cost'
    ];
    public $timestamps = false;
}
