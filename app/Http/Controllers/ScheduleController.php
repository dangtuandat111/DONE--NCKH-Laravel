<?php

namespace App\Http\Controllers;

use App\Models\schedules;
use App\Models\Event;
use Illuminate\Http\Request;
use Redirect,Response;
use DB;
   //->where(' Day_Schedules',   '<=', $end)
class ScheduleController extends Controller
{
    public function index1() {
        if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = DB::table('schedules')->where('Day_Schedules', '>=', $start)->get();
         return Response::json($data);
        }
        return view('calendar.calendar');
    }
    public function index()
    {
       if(request()->ajax()) 
        {
 
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            
        
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get([
            'id','title','start', 'end'
        ]);
         return Response::json($data);
        }
        return view('calendar.calendar');
    }
    
}
