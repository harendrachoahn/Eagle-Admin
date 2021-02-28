<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Symfony\Component\HttpFoundation\Response;

use JWTAuth;
use Validator;
use App\ClockInOut;
use Carbon\Carbon;
use DB;

class ClockInOutController extends Controller
{
    /**
    *Admin employee table history
    *@param type
    *@response Json
    **/
    public function index(){

       // $data = ClockInOut::with('users')->get();
        
        // $history = DB::table('clock_in_outs')
        // ->join('users', 'users.id', '=', 'clock_in_outs.user_id')
        // ->get()->toarray();

        $sql = 'SELECT GROUP_CONCAT(start) AS start_time, GROUP_CONCAT(end) AS end_time,user_id,date FROM `clock_in_outs` GROUP BY date,user_id';

  $history = DB::select(DB::raw($sql));

        // $assignment_details = $assignment->raw_plan()
        //                         ->select(DB::raw('group_concat(name) as names'))
        //                         ->where('assignment_id', 1)
        //                         ->groupBy('flag')
        //                         ->get();

        return view('admin.time-table')->with('history',$history);

    }

	/**
	*Clock In/Out 
	*@param type
	*@response Json
	**/
    public function clockInOut(Request $request)
    {



     	// $validator = Validator::make($request->all(), 
	     //      [
	     //      'type' => 'required', 
	     //     ]);  

      //    if ($validator->fails()) {  
      //          return response()->json(['error'=>$validator->errors()], Response::HTTP_BAD_REQUEST); 
      //       }  
                //$data = $request->only('type');

        $user = JWTAuth::authenticate($request->token);
        
        $data = array();

        $data['user_id']= $user->id;

        $lastRecord = ClockInOut::where('user_id', $user->id)->whereNull('end')->count();

        if($lastRecord){

            $data['date']= Carbon::parse()->format('Y-m-d');
            $data['end']= Carbon::parse()->format('H:i');
            $msg ="Clock Out Sucessfully!";

        }else{

            $data['date'] = Carbon::now()->format('Y-m-d');
            $data['start'] = Carbon::parse()->format('H:i');
            $msg ="Clock In Sucessfully!";

        }

        $response = ClockInOut::create($data);

        /*else{
        	return response()->json(['error' => "Invaild type!"],Response::HTTP_BAD_REQUEST);
        }*/

        return response()->json([
        	'message' => $msg, 
        	'data' => $response
        ],Response::HTTP_OK);
    }
    /**
	*Clock In/Out History
	*@param request
	*@response Json
	**/
    public function clockInOutHistory(Request $request)
    {

        $user = JWTAuth::authenticate($request->token);

        $response = ClockInOut::where('user_id', $user->id)->get();


        return response()->json([
        	'message' => 'Clock In/Out History!', 
        	'data' => $response
        ],Response::HTTP_OK);
    }


}
