<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use DB;

class LoginController extends Controller
{
    //Ham de goi trang login trong thu muc admin
	public function index() {
		return view('admin.login');
	}


	//Ham de goi trang home trong thu muc admin
	public function home() {
		return view('admin.home');
	}


	//Ham xu ly dang nhap 
	public function postLogin(Request $request)
    {
    	$user = $request->user;
    	$pass = $request->password;

    	$teachers = DB::table('giangvien')->paginate(5);

    	//Ham lay thong tin duoc gui ve va kiem tra
        $arr = [
            'user' => $user,
            'password' => $pass,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        
        //Kiem tra 
        if (Auth::guard('giangvien')->attempt($arr)) {
          // return view('admin.home');
        	
        	return view('admin.home', ['giangvien' => $teachers]);

        } 

        //Trong truong hop that bai 
        else {

         	dd('Dang nhap that bai');
     
        }
    }


    //Register
    public function register() {


    	return view('login.register');
    	// DB::table('giangvien')->insert([
    	// 	'teacher_name' => 'Đặng Tuấn Đạt',
    	// 	'id_teacher' => '0806' ,
    	// 	'phone_number' => '000000000' ,
    	// 	'permission' =>'0',
    	// 	'DoB' => '2001/01/01',
    	// 	'user' => 'dtd',
    	// 	'password' => bcrypt('0086'),
    	// 	'id_department' => 'MHT',


    	// ]);

    	//  echo "da them";

    }


}


