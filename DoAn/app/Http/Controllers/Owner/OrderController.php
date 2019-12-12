<?php

namespace App\Http\Controllers\Owner;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function  __construct()
    {
        $this->middleware('authentication');
        $this->middleware('CheckRoleOwner');
    }

    public function index(){
        $today = Carbon::now()->toDateString();

        $ListOrder = DB::select(DB::raw("
        select * from orders  inner join pitches using(user_id) where date_order >= $today
        order by pitch_id, sub_pitch_id,type,start_time
        "));
//        $ListOrder = Order::where('user_id',Auth::id())->whereDate('date_order','>=',$today)
//            ->orderBy('pitch_id')
//            ->orderBy('sub_pitch_id')
//            ->orderBy('type')
//            ->orderBy('start_time')
//            ->get();
        return view('Owner/index/Order', compact('ListOrder'));
    }

}
