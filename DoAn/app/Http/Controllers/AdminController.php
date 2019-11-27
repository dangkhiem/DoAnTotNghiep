<?php

namespace App\Http\Controllers;

use App\Order;
use App\Pitch;
use App\Subpitch;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $getListUser = User::paginate(2);
//        dd($getListUser);
        return view('Admin.index.user', compact('getListUser'));
    }

    public function addUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role_id = 2;
        $user->save();
        $getListUser = User::paginate(2);
        $view = view('Admin.index', compact('getListUser'));
        return response($getListUser, 200);
//        return response([
//            'view' => $view->render(),
//        ],200);
    }

    public function getInfoAUser(Request $request)
    {
        $id = $request->dataGet;
        $user = User::where('id', $id)->get();
//        $user = User::where('id',$id)->get();
        return response([
            'user' => $user
        ]);
    }

    public function editUser(Request $request)
    {

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
        return response('true',200);
//        return response([
//            'view' => $view->render(),
//        ],200);
    }

    public function indexPitch()
    {
        $getListPitch = Pitch::paginate(2);
        return view('Admin.index.pitch', compact('getListPitch'));
    }

    public function  subPitch($id){
//        $type = Subpitch::where('pitch_id',$id)->get(min('start_time'));
//        dd($type);
        $Pitch = Pitch::where('id',$id)->get();
        $ListSubPitch = Subpitch::where('pitch_id',$id)
            ->orderBy('type','asc')
            ->orderBy('start_time','asc')->get();
//        dd($ListSubPitch);
        return view('Admin.index.subPitch', compact('Pitch','ListSubPitch'));
    }
}
