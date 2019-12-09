<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subpitch;
use App\Subpitchdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;

class SubPitchController extends Controller
{
    public function __construct()
    {
        $this->middleware('authentication');
        $this->middleware('roleAdmin');
    }

    public function index($pitch_id)
    {
        $Info = DB::select(DB::raw("
        Select u.name,u.email,u.phone, p.name as pitch_name,p.img , p.area, p.address 
        from users as u 
        inner join pitches as p on u.id = p.user_id where p.id = $pitch_id"
        ));
        $ListSubPitch = Subpitch::where('pitch_id', $pitch_id)->orderBy('type')->get();
        $ListPrice = Subpitchdetail::where('pitch_id', $pitch_id)
            ->orderBy('type', 'asc')->orderBy('start_time', 'asc')->get();
        return view('Admin.index.subPitch', compact('ListSubPitch', 'ListPrice', 'Info'));
    }


}
