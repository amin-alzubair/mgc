<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index() {
        return view('teacher.index');
    }

    public function create(){
        return view('teacher.index');
    }

    public function store(Request $request){
        $data = $request->validate($this->dataValidate(),$this->messages());

        return redirect()->route('teacher.index')->with('success' ,'تمت اضافة استاذ جديد');
    }

    public function show($teacher){
        return view('teacher.show', compact('teacher'));
    }

    public function edit($teacher) {
        return view('teacher.edit', compact('teacher'));
    }

    public function update(Request $request , $teacher) {
        $data = $request->validate($this->dataValidate(),$this->messages());

        $teacher->update($data);

        return redirect()->route('teacher.index');
        
    }

    public function destroy($teacher) {
        $teacher->delete();

        return redirect()->route('teacher.index')->with('success', 'تم حذف الاستاذ بنجاح');
    }

    private function dataValidate() {
        $rules = [
            'name' =>'required|min:3',
            'email' =>'unique:teachers|email|nullable',
            'phone_number'=>'required | numeric',
        ];

        return $rules;
    }

    private function messages() {
        $messages = [
            'name.required' => 'ادخل اسم الاستاذ',
            'name.min'      => 'الاسم يجب ان لا يكون اقل من ثلاثة حروف',
            'email.unique'  =>'حدث خطا يرجاء اعادة التسجيل مر اخري ',
            'email.email'   =>'صيغة البريد غير صالحة',
            'phone_number.required'  =>'ادخل رقم الهاتف ',
            'phone_number.numeric'  =>'رقم الهاتف يجب ان يكون ارقام فقط'

        ];

        return $messages;
    }
}
