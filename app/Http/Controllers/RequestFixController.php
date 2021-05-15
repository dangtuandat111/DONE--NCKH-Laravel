<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestFixController extends Controller
{
    public function getThongTin() {
    	return view('fix.requestFix');
    }
}