<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    public function index(){
        //$department= Department::paginate(3); //ดึงเป็นหน้า // Eloquent
        //$department= Department::all(); // Eloquent
        // $department = DB::table('departments')->paginate(4); //QueryBuilder //ดึงเป็นหน้า
        //$department = DB::table('departments')->get(); //QueryBuilder
        $department = DB::table('departments') // QueryBuilder ่join table
        ->join('users','departments.userid','users.id')
        ->select('departments.*','users.name')
        ->paginate(5);
        return view('admin.department.index',compact('department'));
    }
    public function store(Request $request){
        //ตรวจสอบข้อมูล
    $request->validate([
        'department_name'=>'required|unique:departments|max:255'
    ],
    [
        'department_name.required'=>"กรุณาป้อนชื่อแผนกด้วยครับ",
        'department_name.max'=>"ห้ามป้อนเกิน 255 ตัวอักษร",
        'department_name.unique' => "ชื่อซ้ำ"
        ]);
        //บันทึกข้อมูล
        //Eloquent
       /* $department = new Department;
        $department->department_name = $request->department_name;
        $department->userid = Auth::user()->id;
        $department->save();*/

        //Query Builider
        $data = array();
        $data["department_name"]=$request->department_name;
        $data["userid"] = Auth::user()->id;
        DB::table('departments')->insert($data);
        return redirect()->back()->with('success',"บันทึกข้อมูลสำเร็จ");
    }
}
