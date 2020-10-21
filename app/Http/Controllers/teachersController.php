


<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Models;
use App\Models\giangvien;

class teachersController extends Controller {
	public function index(){
		$teachers = DB::table('giangvien')->where('id_department','MHT')->paginate(5);
		return view('teachers', ['teachers' => $teachers]);
		// $teachers = \App\Models\Teachers::paginate(5);
		// return view('teachers',compact('teachers'));
	}	
	public function store(Request $requests){
		$this->validate($requests,[
			'teacher_name' => 'required',
			'id_teacher' => 'required',
			'phone_number' => 'required',
			'permission' => 'required',
			'DoB' => 'required',
			'user' => 'required',
			'password' => 'required',
			'id_department' => 'required',
			'teacher_rank' => 'required',
		]);

		$emps = new Teachers;

		$emps->teacher_name = $requests->input('teacher_name');
		$emps->id_teacher = $requests->input('id_teacher');
		$emps->phone_number = $requests->input('phone_number');
		$emps->permission = $requests->input('permission');
		$emps->DoB = $requests->input('DoB');
		$emps->user = $requests->input('user');
		$emps->password = $requests->input('password');
		$emps->id_department = $requests->input('id_department');
		$emps->teacher_rank = $requests->input('teacher_rank');

		$emps->save();
		return redirect('view-teachers')->with('Success','Data Saved');
	}
}
teachersController.php
Hiển thị Teachers.php.