<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePitchRequest;
use App\Pitch;
use App\Subpitch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index() {
        $id = Auth::id();
        $data = User::where('id',$id)->get();
        return view('Owner.index.info', compact('data'));
    }
//    public function pitchInfo(){
//        $id = Auth::id();
//        $pitch = Pitch::where('user_id', $id)->get();
//        return view('Owner.index.pitch', compact('pitch'));
//    }
//    public function subPitchInfo($id){
//        $user_id = Auth::id();
//        $pitch = Pitch::where('id', $user_id)->get();
//        $subPitchInfo = Subpitch::where('pitch_id',$id)->where('shop_id',$user_id)->get();
//        return view('Owner.index.subPitchInfo',compact('subPitchInfo','pitch'));
//    }

    public function getInfoUser(){
        $id = Auth::id();
        $data = User::where('id', $id);
        return $data;
    }


//    public  function store(StorePitchRequest $request){
//        $Pitch =new Pitch();
//        $image = $request->file('img');
//        $new_name =rand(). '.'. $image->getClientOriginalExtension();
//        $image->move(public_path('images'),$new_name);
//        $Pitch->user_id = Auth::id();
//        $Pitch->name = $request->name;
//        $Pitch->area = $request->area;
//        $Pitch->address = $request->address;
//        $Pitch->img = "images/ $new_name";
//        $Pitch->save();
//        $getListPitch = $Pitch::where('user_id', Auth::id())->get();
//        return response($getListPitch, 200);
//    }

}
