<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;	
//use DB;
//use Session;
use App\models\modules;
use Maatwebsite\Excel\Concerns\ToModel;
//use Redirect,Response;
//use Excel;
use App\Imports\ScheduleImport;
use App\Imports\UserImport;

use Excel;


class importController extends Controller
{
    //
    public function getModules(){
    	return view('import.importTeacher');
    }

    public function postModules(Request $request) {
    	$import = new ScheduleImport();
    	
    	Excel::import($import,$request->hocphan );

   		//return view('import.importTeacher');
    }
}
