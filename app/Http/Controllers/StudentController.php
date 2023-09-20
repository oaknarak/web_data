<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index(){
        $students=Student::all();
        $num_students = Student::count();
        return view('student',compact('students','num_students'));
    }
    public function insert(Request $request){
        $new_student=new Student;
        $new_student->stu_name=$request->stu_name;
        $new_student->age=$request->age;
        $new_student->grade=$request->grade;
        $new_student->save();
        return redirect('/students');
    }
    public function delete($id){
        Student::destroy($id);
        return redirect('/students');
    }
}
