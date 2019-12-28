<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
        public function __construct()
        {
            $this->middleware('authentication');
            $this->middleware('roleAdmin');
        }

        public function index(){
            $id =Auth::id();
            $data = User::where('id',$id)->get();
            return view('Admin.index.PersonalInfo',  compact('data'));
        }

        public function update(Request $request){
            Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required | phone',
            ]);
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();
            $data = User::where('id', Auth::id())->get();
            return view('Admin.index.PersonalInfo', compact('data'));
        }
}
