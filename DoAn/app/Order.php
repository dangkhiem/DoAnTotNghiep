<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',	'sub_pitch_id','start_time','end_time',	'bill',
    ];
    public $timestamps = false;
}
