<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','pitch_id','subpitch_id','type','subpitch_name','start_time', 'end_time','bill', 'dateOrder'
    ];
    public $timestamps = false;
}
