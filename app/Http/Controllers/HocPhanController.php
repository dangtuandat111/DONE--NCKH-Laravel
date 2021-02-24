<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Illuminate\Support\Facades\Validator;

use App\models\modules;

class HocPhanController extends Controller
{
    public static function getThongTin() {
    	
		$modules = DB::table('module')->Paginate(10);

		return view ('modules.thongtin', ['modules' => $modules] );
	}

	public function fixThongTin($id) {
		$modules = DB::table('module')->where('ID_Module','=', $id)->get();
		$departments = DB::table('department')->get();
		
		return view ('modules.sua', ['modules' => $modules] , ['department' => $departments]);
	}

	public function addThongTin() {
		$departments = DB::table('department')->get();
		return view('modules.them', ['department' => $departments]);
	}

	public function postAdd(Request $request) {

		$rules = [
	 	'inputID_module' => 'required|max:25',
        'inputSemester' =>'required|max:25',
        'inputCredits' =>'required',
        'inputModule_name' =>'required',
        'inputTheory' =>'required',
        'inputExercise' =>'required',
        'inputPractice' =>'required',
        'inputProject' =>'required',
        'inputID_department' =>'required'
    	];

    	$messages = [
        'inputSemester.required' => 'Kì học là trường bắt buộc',
        'inputID_module.required' => 'Mã học phần là trường bắt buộc',
        'inputCredits.required' => 'Số tín chỉ là trường bắt buộc',
        'inputModule_name.required' => 'Tên học phần là trường bắt buộc',
        'inputTheory.required' => 'Số tiết lý thuyểt là trường bắt buộc',
        'inputExercise.required' => 'Số tiết bài tập là trường bắt buộc',
        'inputPractice.required' => 'Số tiết thực hành là trường bắt buộc',
        'inputProject.required' => 'Số tiết bài tập lớn là trường bắt buộc',
        'inputID_department.required' => 'Bộ môn là trường bắt buộc'
    	];
	    $validator = Validator::make($request->all(), $rules, $messages);
	    
	    if($validator->fails()) {
	    	 return back()->withErrors($validator);
	    }
	    else {
	    	$temp = DB::table('module')->where('ID_Module' , $request->inputID_module)->count() ;
			if($temp >0 ) {
				return back()->withErrors( 'Mã học phần đã tồn tại');

			}

			if(!is_numeric( $request->inputSemester ) ) {

				return back()->withErrors( 'Nhập lại kỳ học');
			}
			else {
				if ( $request->inputSemester !=1 and $request->inputSemester !=2) {
					return back()->withErrors('Giá trị kỳ học sai');
				}
			}
	    }

		$bm = new modules;
		$bm->ID_Module = $request->inputID_module;
		$bm->Semester = $request->inputSemester;
		$bm->Credit = $request->inputCredits;
		$bm->Module_Name = $request->inputModule_name;
		$bm->Theory = $request->inputTheory;
		$bm->Exercise = $request->inputExercise;
		$bm->Practice = $request->inputPractice;
		$bm->Project = $request->inputProject;
		$bm->ID_Department  = $request->inputID_department;

		$bm->save();

		return redirect('admin/hocphan/thongtin')->with('thongbao', 'Thêm thành công');
		
	}


	public function postFix(request $request){
		
		$id = $request->inputID_module;

		$temp = DB::table('module')->where('ID_Module' , $request->inputID_module)->count() ;
			if($temp >0 ) {
				return back()->withErrors( 'Mã học phần đã tồn tại');

			}
		DB::table('module')->where('id_module', $id)->update(
			['semester' => $request->inputSemester,
			'credit' => $request->inputCredits,
			'module_name' => $request->inputModule_name,
			'theory' => $request->inputTheory,
			'exercise' => $request->inputExercise,
			'practice' => $request->inputPractice,
			'project' => $request->inputProject,
			'id_department' => $request->inputID_department]

		);


		return redirect('admin/hocphan/thongtin')->with('thongbao', 'Sửa thành công');
	}

	public function deleteThongTin($id) {
		DB::table('module')->where('ID_Module' , $id)->delete();

		return redirect('admin/hocphan/thongtin')->with('thongbao', 'Xóa học phần thành công');
	}

}
