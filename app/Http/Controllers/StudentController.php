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
    public function editForm($id){
        $num_students = Student::count();
        $student_update=Student::findOrFail($id);
        $students=Student::all();
        return view('editFromStudents',compact('student_update','num_students','students'));
    }
    public function update(Request $request,$id){
        $update_student=Student::findOrFail($id);
        $update_student->stu_name = $request->stu_name;
        $update_student->age = $request->age;
        $update_student->grade = $request->grade;
        $update_student->save();
        return redirect('/students');
    }
}
