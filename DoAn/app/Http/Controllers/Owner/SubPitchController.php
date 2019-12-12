<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequestPrice;
use App\Pitch;
use App\Subpitch;
use App\Subpitchdetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubPitchController extends Controller
{
    public function  __construct()
    {
        $this->middleware('authentication');
        $this->middleware('CheckRoleOwner');
    }

    public function index($id)
    {
        $user_id = Auth::id();
        $Pitch = Pitch::where('id', $id)->get();
        $ListSubPitch = Subpitch::where('pitch_id', $id)->where('user_id', $user_id)->get();
        $ListPrice = Subpitchdetail::where('pitch_id', $id)
            ->orderBy('type', 'asc')->orderBy('start_time', 'asc')->get();
        return view('Owner.index.subPitchInfo', compact('ListSubPitch', 'ListPrice', 'Pitch'));
    }

    public function storePrice(OwnerRequestPrice $request)
    {
        $beginHour = Carbon::parse($request['start_time']);
        $endHour = Carbon::parse($request['end_time']);
        if ($beginHour->addMinute()->gt($endHour)) {
            return response()->json([
                'errors' => [
                    "start_time" => "start_time phải bé hơn end_time"
                ]
            ], 422);
        }
        $data = Pitch::where('id',$request->pitch_id)->get();
        foreach ($data as $time) {
            $open = $time->open_time;
            $close = $time->close_time;
        }
        if ($request->start_time < $open || $request->end_time> $close){
            return response()->json([
                'errors' =>[
                    "start_time" => "thời gian bắt đầu và kết thúc phải nằm trong khoảng từ $open đến $close "
                ]
            ],422);
        }
        $beginHour = $request->start_time;
        $endHour = $request->end_time;
        $type57 = $request->type;
        $pitch_id = $request->pitch_id;

        $checkData = DB::select(DB::raw("
SELECT * FROM subpitchdetails WHERE (start_time < '$beginHour' and end_time > '$beginHour' and subpitchdetails.type = '$type57' and pitch_id = '$pitch_id') 
OR
        (start_time < '$endHour' and end_time > '$endHour' and subpitchdetails.type = '$type57' and pitch_id = '$pitch_id' )"));
        if (count($checkData)) {
            return response()->json([
                'errors' => [
                    "start_time" => "start_time và end_time không hợp lệ"
                ]
            ], 422);
        }

//        xu ly loi
        $checkData2 = DB::select(DB::raw("SELECT * FROM subpitchdetails WHERE (start_time > '$beginHour' and start_time <'$endHour' and subpitchdetails.type = '$type57' and pitch_id = '$pitch_id') OR
        (end_time > '$beginHour' and end_time < '$endHour' and subpitchdetails.type = '$type57' and pitch_id = '$pitch_id')"));
        if (count($checkData2)) {
            return response()->json([
                'errors' => [
                    "start_time" => "start_time và end_time không hợp lệ"
                ]
            ], 422);
        }
//        xu ly co ton tai chua
        $checkData3 = Subpitchdetail::where('pitch_id', $request->pitch_id)
            ->where('type', $request->type)
            ->where('start_time', $request->start_time)
            ->where('end_time', $request->end_time)->get();
        if (count($checkData3)) {
            return response()->json([
                'errors' => [
                    "start_time" => "start_time va endtime da ton tai"
                ]
            ], 422);
        }
        $subPitchDetail = new Subpitchdetail();
        $subPitchDetail->type = $request->type;
        $subPitchDetail->pitch_id = $request->pitch_id;
        $subPitchDetail->start_time = $request->start_time;
        $subPitchDetail->end_time = $request->end_time;
        $subPitchDetail->cost = $request->cost;
        $subPitchDetail->save();
        return response('success', 200);
    }

    public function delete($id)
    {
        Subpitchdetail::where('id', $id)->delete();
    }

    public function StoreSubPitch(Request $request)
    {
        $id = Auth::id();
        $this->validate($request, [
            'SubPitchName' => 'required',
            'pitch_id' => 'required',
            'type' => 'required',
        ]);
        $name = $request->SubPitchName;
        $pitch_id = $request->pitch_id;
        $ChecksubPitchName = Subpitch::where('name', $name)->where('pitch_id', $pitch_id)->get();
        if (count($ChecksubPitchName)) {
            return response()->json([
                'errors' => [
                    'SubPitchName' => "Tên đã tồn tại ..."
                ]
            ], 422);
        }
        $subPitch = new Subpitch();
        $subPitch->name = $name;
        $subPitch->user_id = $id;
        $subPitch->pitch_id = $request->pitch_id;
        $subPitch->type = $request->type;
        $subPitch->save();
        return response()->json([
            'message' => 'success'
        ]);
    }

    public function deletePrice(Request $request)
    {
        $id = $request->dataGet;
        Subpitchdetail::where('id', $id)->delete();
        return response()->json([
            'message' => 'xóa thành công',
        ], 200);
    }

    public function deleteSubPitch(Request $request)
    {
        $id = $request->dataGet;
        Subpitch::where('id', $id)->delete();
        return response()->json([
            'message' => 'xóa thành công',
        ], 200);
    }

    public function test()
    {
        $beginHour = "07:00:00";
        $endHour = "10:00:00";
        $checkData = DB::select(DB::raw("SELECT * FROM subpitchdetails WHERE (start_time < '$beginHour' and end_time > '$beginHour') OR
        (start_time < '$endHour' and end_time > '$endHour' )
"));
        if (count($checkData)) {
            return response()->json([
                'errors' => [
                    "start_time" => "start_time và end_time không hợp lệ"
                ]
            ], 422);
        }
        $checkData2 = DB::select(DB::raw("SELECT * FROM subpitchdetails WHERE (start_time > '$beginHour' and start_time <'$endHour') OR
        (endtime > '$beginHour' and end_time < '$endHour' )"));
        if (count($checkData2)) {
            return response()->json([
                'errors' => [
                    "start_time" => "start_time và end_time không hợp lệ"
                ]
            ], 422);
        }
//        $subPitchDetail = new Subpitchdetail();
//        $subPitchDetail->type =


    }
}
