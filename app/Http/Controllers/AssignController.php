<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\model\schedules;

class AssignController extends Controller
{
    //
    public function index() {
    	// $schedules = DB::table('schedules')->join('module_class','module_class.ID_Module_Class', '=' , 'schedules.ID_Module_Class')->select(DB::raw('Dis as userCount, status'))->get();
    	$schedules = DB::table('schedules')->select(DB::raw('distinct schedules.ID_Module_Class ,Module_Class_Name,Number_Reality,School_Year,ID_Teacher'))->join('module_class','module_class.ID_Module_Class', '=' , 'schedules.ID_Module_Class')->where('ID_Teacher','=',null)->get();
    	return view('assign.assign')->with('schedules', $schedules);;
    }

    public function submit(Request $request) {
    	//print_r($request->request);
    	$i = 0;
    	$array = [] ;
    	foreach($request->request as $key2 => $values) {
    		if($i == 3) {
    			foreach($values as $key => $gt) {
    				echo $key."<br />";
    				DB::table('module_class')->where('ID_Module_Class', $key)->update([	'ID_Teacher' => '0086']);
    			}
    		}
    		else {
    			$i = $i + 1;
    		}
    		
    	}
    	return view('assign.assign');
    }
}
