<?php

namespace App\Http\Controllers;

use App\Pitch;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        if (isset($request->name) || isset($request->date) ||isset($request->time)){
            $getListPitch = Pitch::orderBy('name','asc')->orderBy('area','asc')->get();
        }
        $getListPitch = Pitch::orderBy('name','asc')->orderBy('area','asc')->get();

        return view('search', compact('getListPitch'));
    }

    public function SearchSubPitch($id){
        dd($id);
    }
}
