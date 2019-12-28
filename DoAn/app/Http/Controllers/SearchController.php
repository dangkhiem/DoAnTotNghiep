<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\Pitch;
use App\Subpitch;
use App\Subpitchdetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->name)) {
            if (isset($request->time)){
                $getListPitch = Pitch::where('name', 'LIKE', "%$request->name%")
                    ->orWhere('area', 'LIKE', "%$request->name%");
                $getListPitch = $getListPitch->where('open_time', '<=', $request->time)
                    ->orderBy('name', 'asc')->orderBy('area', 'asc')->get();
                return view('search', compact('getListPitch'));
            }

            $getListPitch = Pitch::where('name', 'LIKE', "%$request->name%")
                ->orWhere('area', 'LIKE', "%$request->name%")
                ->orderBy('name', 'asc')->orderBy('area', 'asc')->get();
            return view('search', compact('getListPitch'));
        }
        $getListPitch = Pitch::orderBy('name', 'asc')->orderBy('area', 'asc')->get();
        return view('search', compact('getListPitch'));
    }

    public function SearchSubPitch($id)
    {
        $Pitch = Pitch::where('id', $id)->get();
        $ListPrice = Subpitchdetail::where('pitch_id', $id)->get();
        $SubPitch = Subpitch::where('pitch_id', $id)->get();
        $Order = Order::where('id', 736217);
        return view('searchSubPitch', compact('ListPrice', 'SubPitch', 'Pitch', 'Order'));
    }

    public function SearchFreeTime(Request $request)
    {
        $subpitch_id = $request->subpitch_id;
        $date = $request->date;
        $pitch_id = Subpitch::where('id', $subpitch_id)->get();
        foreach ($pitch_id as $data) {
            $pitch_id = $data->pitch_id;
            break;
        }
        DB::select(DB::raw('set @count:=0'));
        DB::select(DB::raw('set @count2:=0'));
//        $sql = "select id, start, end from (select @count:=@count+1 as id, start from ( (select open_time as start from pitches where id = $pitch_id)
//                    union (select end_time from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end_time)) as T1) as time1
//                    inner join
//                    (select @count2:=@count2+1 as id, end from ((select start_time as end from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end)
//        union (select close_time from pitches where id = $pitch_id)) as T2) as time2
//        using(id)
//                    ";
        $sql = "select id,start,end from 
                (select @count:= @count+1 as id,start from (
        (select open_time as start from pitches where id = $pitch_id)
        union 
        (select end_time from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end_time ASC)
        
        ) as T1
        order by start asc) as time1
                inner join 
                (select @count2:= @count2+1 as id,end from (
        (select start_time as end from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end ASC)
        union 
        (select close_time  from pitches where id = $pitch_id)
        ) as T2 order by end asc) as time2
                using(id)
        ";

        $Orders = DB::select(DB::raw($sql));
        $typeName = Subpitch::where('id', $subpitch_id)->get();
        foreach ($typeName as $data) {
            $type = $data->type;
            $name = $data->name;
        };
        $Data = array('pitch_id' => $pitch_id,
            'subpitch_id' => $subpitch_id,
            'date' => $date,
            'type' => $type,
            'name' => $name,);


        $view = view('searchResult', compact('Orders', 'Data'));
        return response([
            'view' => $view->render(),
        ], 200);
    }

    public function Order(OrderRequest $request)
    {
        if (!Auth::check()) {
            return response()->json([
                "message" => "Bạn vui lòng đăng nhập trước khi đặt sân",
            ], 422);
        }
        if (Auth::user()->role_id != 3) {
            return response()->json([
                "message" => "Vui lòng đăng nhập bằng tài khoản user để đặt sân",
            ], 422);
        }
        if ( !($this->checkOpenCloseTime($request->pitch_id, $request->startTime, $request->endTime)) ){
            return response()->json([
                "message" => "Thời gian không hợp lệ",
            ], 422);
        }

        if ( !($this->CheckOrderTime($request->pitch_id, $request->subpitch_id,$request->date,$request->startTime ,$request->endTime))){
            return response()->json([
                "message" => "Thời gian đã tồn tại",
            ], 422);
        }

        $bill = $this->caculateBill($request->startTime, $request->endTime, $request->type, $request->pitch_id);
        $order = new  Order();
        $order->pitch_id = $request->pitch_id;
        $order->sub_pitch_id = $request->subpitch_id;
        $order->date_order = $request->date;
        $order->subpitch_name = $request->name;
        $order->start_time = $request->startTime;
        $order->end_time = $request->endTime;
        $order->type = $request->type;
        $order->user_id = Auth::id();
        $order->bill = $bill;
        $order->save();
        $view = $this->SubpitchFreeTime($request->subpitch_id, $request->date);
        return response()->json([
            "message" => "Đăng ký thành công",
            'view' => $view->render(),
        ], 200);

    }

    public function caculateBill($startTime, $endTime, $type, $pitch_id)
    {
        $startTime = Carbon::parse($startTime);
        $endTime = Carbon::parse($endTime);
        $value = 0;
        while ($startTime < $endTime) {
            $temp = $startTime->addMinutes(30);
            $value += $this->Bill30($startTime->toTimeString(), $temp->toTimeString(), $type, $pitch_id);
        }
        return $value / 2;
    }

    public function Bill30($startTime, $endTime, $type, $pitch_id)
    {
        $bill = DB::select(DB::raw("select cost from subpitchdetails where type = $type and pitch_id = $pitch_id
                and start_time <= '$startTime' and end_time >= '$endTime'"));
        foreach ($bill as $data) {
            $value = $data->cost;
        }
        $value = (int)$value;
        return $value;
    }

    public function SubpitchFreeTime($subpitch_id, $date)
    {
        $pitch_id = Subpitch::where('id', $subpitch_id)->get();
        foreach ($pitch_id as $data) {
            $pitch_id = $data->pitch_id;
            break;
        }
        DB::select(DB::raw('set @count:=0'));
        DB::select(DB::raw('set @count2:=0'));
        $sql = "select id,start,end from 
                (select @count:= @count+1 as id,start from (
        (select open_time as start from pitches where id = $pitch_id)
        union 
        (select end_time from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end_time ASC)
        
        ) as T1
        order by start asc) as time1
                inner join 
                (select @count2:= @count2+1 as id,end from (
        (select start_time as end from orders where sub_pitch_id = $subpitch_id and date_order = '$date' order by end ASC)
        union 
        (select close_time  from pitches where id = $pitch_id)
        ) as T2 order by end asc) as time2
                using(id)
        ";
        $Orders = DB::select(DB::raw($sql));
        $typeName = Subpitch::where('id', $subpitch_id)->get();
        foreach ($typeName as $data) {
            $type = $data->type;
            $name = $data->name;
        };
        $Data = array('pitch_id' => $pitch_id,
            'subpitch_id' => $subpitch_id,
            'date' => $date,
            'type' => $type,
            'name' => $name,);

        $view = view('searchResult', compact('Orders', 'Data'));
        return $view;
    }

//    public function testsql()
//    {
//        DB::select(DB::raw('set @count:=0'));
//        DB::select(DB::raw('set @count2:=0'));
//        $sql = "
//        select @count:= @count+1 as id,start from (
//        (select open_time as start from pitches where id = 1)
//        union
//        (select end_time from orders where sub_pitch_id = 1 and date_order = '2019-12-11' order by end_time ASC)
//
//        ) as T1
//        order by start asc";
//
//        $sql = "
//        select @count2:= @count2+1 as id,end from (
//        (select start_time as end from orders where sub_pitch_id = 1 and date_order = '2019-12-11' order by end ASC)
//        union
//        (select close_time  from pitches where id = 1)
//        ) as T2 order by end asc
//        ";
//
//        $sql = "select id,start,end from
//                (select @count:= @count+1 as id,start from (
//        (select open_time as start from pitches where id = 1)
//        union
//        (select end_time from orders where sub_pitch_id = 1 and date_order = '2019-12-11' order by end_time ASC)
//
//        ) as T1
//        order by start asc) as time1
//                inner join
//                (select @count2:= @count2+1 as id,end from (
//        (select start_time as end from orders where sub_pitch_id = 1 and date_order = '2019-12-11' order by end ASC)
//        union
//        (select close_time  from pitches where id = 1)
//        ) as T2 order by end asc) as time2
//                using(id)
//        ";
//        $data = DB::select(DB::raw($sql));
//        dd($data);
//
//    }

    public function checkOpenCloseTime($pitchID, $startTime, $endTime){
        $PitchesData = Pitch::where('id', $pitchID)->get();
        foreach ($PitchesData as $data){
            $openTime = $data->open_time;
            $closeTime = $data->close_time;
        }
        if ($startTime<$openTime || $endTime >$closeTime){
            return  false;
        }
        return true;
    }

    public function CheckOrderTime($id, $subpitchID, $date, $startTime, $endTime){
        $sql = "
        select * from orders where 
        pitch_id = $id and sub_pitch_id = $subpitchID and date_order = '$date'
        and ((start_time = '$startTime' and end_time = '$endTime') || ('$startTime'> start_time and '$startTime' <end_time) 
        || ('$endTime'> start_time and '$endTime' <end_time)  || start_time > '$startTime' and start_time  < '$endTime' 
        || end_time > '$startTime' and end_time < '$endTime')
        ";
        $dataOrder = DB::select(DB::raw($sql));
        if (count($dataOrder)){
            return false;
        }
        return true;
    }
}
