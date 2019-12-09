<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
        $this->middleware('roleAdmin');
    }

    public function index(){
        $getListUser = User::paginate(10);
        return view('Admin.index.user', compact('getListUser'));
    }

    public function store(StoreUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role_id = 3;
        $user->save();
        $getListUser = User::paginate(10);
        $view = view('Admin.index', compact('getListUser'));
        return response($getListUser, 200);
    }

    public function getInfo(Request $request){
        $user = User::where('id', $request->dataGet)->get();
        return response([
            'user' => $user
        ]);
    }

    public function edit(EditUserRequest $request){
        $currentPage = null;
        if (isset($request->page_number)) {
            $currentPage = $request->page_number;
        }
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        $getListUser = User::orderBy('id', 'asc')->paginate(10);
        $view = view('Admin.index.user', compact('getListUser'));
        return response('true', 200);
    }
}
