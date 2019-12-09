<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePitchRequest;
use App\Pitch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PitchController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
        $this->middleware('roleAdmin');
    }

    public function index(){
        $getListPitch = Pitch::paginate(5);
        return view('Admin.index.pitch', compact('getListPitch'));
    }

    public function store(StorePitchRequest $request){

    }
}
