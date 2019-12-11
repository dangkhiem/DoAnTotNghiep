<?php

namespace App\Http\Controllers;

use App\Order;
use App\Pitch;
use App\Subpitch;
use App\Subpitchdetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request){
//        dd($request->all());
        if (isset($request->name) || isset($request->date) ||isset($request->time)){
            $getListPitch = Pitch::orderBy('name','asc')->orderBy('area','asc')->get();
        }
        $getListPitch = Pitch::orderBy('name','asc')->orderBy('area','asc')->get();

        return view('search', compact('getListPitch'));
    }

    public function SearchSubPitch($id){
        $Pitch = Pitch::where('id',$id)->get();
        $ListPrice = Subpitchdetail::where('pitch_id',$id)->get();
        $SubPitch = Subpitch::where('pitch_id',$id)->get();
        $Order = Order::where('id',736217);
        return view('searchSubPitch',compact('ListPrice','SubPitch','Pitch','Order'));
//        $ListSubPitch = Subpitch::where('pitch_id',$id)
//        $data = DB::select(DB::raw("select * from (select * from subpitchdetails where pitch_id =1 and type =5 order by start_time ) as t1"));
//        dd($data);
//        $pitch_id = $id;
//        $date = Carbon::now()->toDateString();
//        DB::select(DB::raw('set @count:=0'));
//        DB::select(DB::raw('set @count2:=0'));
//        $Data = DB::select(DB::raw("( SELECT start as end from orders order by end) union (SELECT endTime from TimeValue) order by end)"));


//        $data = DB::select(DB::raw("
//        select id,start,end from (select @count:= @count+1 as id,end from ( ( SELECT start as end from TIME order by end) union (SELECT endTime from TimeValue) order by end) as T1 ) as openTime
//        inner join
//        ((select @count2:= @count2+1 as id,start from ( (SELECT startTime as start from TimeValue) union ( SELECT end from TIME order by end) order by start) as T2) ) as closeTime
//        USING(id)
//        "));
//        dd($data);
    }

    public function SearchFreeTime(Request $request){
        $subpitch_id = $request->subpitch_id;
        $date = $request->date;
        $pitch_id = Subpitch::where('id',$subpitch_id)->get();
        foreach ($pitch_id as $data){
            $pitch_id = $data->pitch_id;
            break;
        }
        DB::select(DB::raw('set @count:=0'));
        DB::select(DB::raw('set @count2:=0'));
//        $sql =" (select @count:=@count+1 as id, start from ( (select open_time as start from pitches where id = $pitch_id)
//                    union (select end_time from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end_time)) as T1)
//        ";
//        $sql = "(select @count2:=@count2+1 as id, end from ((select start_time as end from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end)
//        union (select close_time from pitches where id = $pitch_id)) as T2)
//        ";
        $sql = "select id, start, end from (select @count:=@count+1 as id, start from ( (select open_time as start from pitches where id = $pitch_id) 
                    union (select end_time from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end_time)) as T1) as time1
                    inner join 
                    (select @count2:=@count2+1 as id, end from ((select start_time as end from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end)
        union (select close_time from pitches where id = $pitch_id)) as T2) as time2
        using(id)
                    ";
        $Orders = DB::select(DB::raw($sql));
        $Pitch = Pitch::where('id',$pitch_id)->get();
        $ListPrice = Subpitchdetail::where('pitch_id',$pitch_id)->get();
        $SubPitch = Subpitch::where('pitch_id',$subpitch_id)->get();
        $view = view('searchResult', compact('Orders'));
        return response([
            'view' => $view->render(),
        ]);
    }
}
