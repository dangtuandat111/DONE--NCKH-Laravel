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
    //

	public function index() {
		return view('admin.login');
	}

	public function home() {
		return view('admin.home');
	}

	public function postLogin2( Request $request) {

		$user = $request->user;
    	$pass = $request->password;



		if( Auth::guard('giangvien')->attempt(['user' => $user , 'password' => $pass]) ) {
			return view('admin.home');

		}
		else {

			
			dd('Dang nhap that bai');
		}
	}


	public function postLogin(Request $request)
    {

    	$username = $request->user;
    	$password = $request->password;

    	echo $username."<br>".$password;
    	

        $arr = [
            'id_teacher' => $request->input('user'),
            'password' => $request->input('password'),
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không


        
        // if (Auth::guard('giangvien')->attempt(['user' => $id , 'password' =>$password ])) {
         if (Auth::guard('giangvien')->attempt($arr)) {
           return view('admin.home');

            
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {

         dd('Dang nhap that bai');
            
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }


    public function register() {
    	DB::table('giangvien')->insert([
    		'teacher_name' => 'Đặng Tuấn Đạt',
    		'id_teacher' => '0806' ,
    		'phone_number' => '000000000' ,
    		'permission' =>'0',
    		'DoB' => '2001/01/01',
    		'user' => 'dtd',
    		'password' => bcrypt('0086'),
    		'id_department' => 'MHT',


    	]);

    	 echo "da them";

    }


}


