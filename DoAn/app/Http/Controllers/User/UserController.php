<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
        $this->middleware('roleUser');
    }

    public function index()
    {
        $data = User::where('id', Auth::id())->get();
        return view('User.index', compact('data'));
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required | phone',
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        $data = User::where('id', Auth::id())->get();
        return view('User.index', compact('data'));
    }

    public function UserOrder()
    {
        $user_id = Auth::id();
        $time = Carbon::now()->toDateString();
        $sql = "select pitches.name,pitches.address,orders.subpitch_name, orders.type,orders.date_order, orders.start_time, orders.end_time, orders.bill
 from orders inner join pitches on orders.pitch_id = pitches.id where date_order >= '$time'
        and orders.user_id = $user_id order by date_order desc";
        $data = DB::select(DB::raw($sql));
        return view('User.Order', compact('data'));
    }

    public function HistoryOrder()
    {
        $user_id = Auth::id();
        $time = Carbon::now()->toDateString();
        $sql = "select pitches.name,pitches.address,orders.subpitch_name, orders.type,orders.date_order, orders.start_time, orders.end_time, orders.bill
 from orders inner join pitches on orders.pitch_id = pitches.id where date_order < '$time'
        and orders.user_id = $user_id order by date_order desc";
        $data = DB::select(DB::raw($sql));
        return view('User.HistoryOrder', compact('data'));
    }


}
