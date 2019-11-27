<?php

namespace App\Http\Controllers;

use App\Pitch;
use App\Subpitch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index() {
        return view('Owner.index.info');
    }
    public function pitchInfo(){
        $id = Auth::id();
        $pitch = Pitch::where('id', $id)->get();
        return view('Owner.index.pitch', compact('pitch'));
    }
    public function subPitchInfo($id){
        $user_id = Auth::id();
        $pitch = Pitch::where('id', $user_id)->get();
        $subPitchInfo = Subpitch::where('pitch_id',$id)->where('shop_id',$user_id)->get();
        return view('Owner.index.subPitchInfo',compact('subPitchInfo','pitch'));
    }

    public function addSubPitch(Request $request){
//
    }
    public function getInfoUser(){
        $id = Auth::id();
        $data = User::where('id', $id);
        return $data;
    }

}
