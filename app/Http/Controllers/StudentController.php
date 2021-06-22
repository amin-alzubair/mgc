<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view("dashboard.students.index",compact('students'));
    }

    public function store(StudentRequest $request) {

        $data=$request->validated();
        
        Student::create($data);
        return response()->json(['message'=>'تم اضافة طالب جديد بنجاح']);
    }

    public function show(Studen $student){

        return response()->json(['user'=>$user]);

    }

    public function destroy(Student $student){
        $student->delete();
        return response()->jsone(['message'=>'تم حذف طالب بنجاح']);

    }
}
