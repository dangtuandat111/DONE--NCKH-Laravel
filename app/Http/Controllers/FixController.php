<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FixController extends Controller
{
    public function getThongTin() {
    	return view('fix.thongtin');
    }
}
