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
        $this->middleware('roleOwner');
    }

    public function index(){
        $id = Auth::id();
        $today = Carbon::now()->toDateString();
        $ListOrder = DB::select(DB::raw("
        select * from orders  inner join pitches on orders.pitch_id = pitches.id where date_order >= '$today' and orders.user_id = $id
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

    public function OrderHistory(){
        $id = Auth::id();
        $today = Carbon::now()->toDateString();
        $ListOrder = DB::select(DB::raw("
        select * from orders  inner join pitches on orders.pitch_id = pitches.id where date_order < '$today' and orders.user_id = $id
        order by pitch_id, sub_pitch_id,type,start_time
        "));
        return view('Owner/index/Order', compact('ListOrder'));
    }


//    public function Order(){
//        $id = Auth::id();
//        $today = Carbon::now()->toDateString();
//        $ListOrder = DB::select(DB::raw("
//        select * from orders  inner join pitches on orders.pitch_id = pitches.id where date_order >= '$today' and orders.user_id = $id
//        order by pitch_id, sub_pitch_id,type,start_time
//        "));
//    }

}
