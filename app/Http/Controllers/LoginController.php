<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Session;
use DB;
use Illuminate\Database\MySqlConnection;

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

        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email|max:255',
            'password' => 'required|min:1'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.max' => 'Tên email không quá 255 ký tự',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 1 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::guard('giangvien')->attempt(['email' => $email, 'password' =>$password])) {
                $teacher_name = DB::giangvien()->where('id_teacher' , '0806');
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                return view('admin.home')->with($teacher_name );
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('login');
            }
        }
    }


    //Register
    public function register() {


    	return view('admin.register');
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


