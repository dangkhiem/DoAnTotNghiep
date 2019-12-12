<?php

namespace App\Http\Controllers\Owner;

use App\Http\Requests\StorePitchRequest;
use App\Pitch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PitchController extends Controller
{
    public function  __construct()
    {
        $this->middleware('authentication');
        $this->middleware('CheckRoleOwner');
    }

    public function index(){
        $id = Auth::id();
        $pitch = Pitch::where('user_id', $id)->get();
        return view('Owner.index.pitch', compact('pitch'));
    }

    public  function store(StorePitchRequest $request){
        $beginHour = Carbon::parse($request['open_time']);
        $endHour = Carbon::parse($request['close_time']);
        if ($beginHour->addMinutes(30)->gt($endHour)) {
            return response()->json([
                'errors' => [
                    "start_time" => "close time phải lớn hơn open_time tối thiểu 30 phút"
                ]
            ], 422);
        }
        $Pitch =new Pitch();
        $image = $request->file('img');
        $new_name =rand(). '.'. $image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_name);
        $Pitch->user_id = Auth::id();
        $Pitch->name = $request->name;
        $Pitch->area = $request->area;
        $Pitch->address = $request->address;
        $Pitch->open_time = $request->open_time;
        $Pitch->close_time = $request->close_time;
        $Pitch->img = "images/$new_name";
        $Pitch->save();
        $getListPitch = $Pitch::where('user_id', Auth::id())->get();
        return response($getListPitch, 200);
    }
}
