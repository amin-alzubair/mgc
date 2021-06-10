<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['min:8','required','confirmed'],
            
        ];
    }
    public function messages(){
        return [
            'name.required' =>'الاسم يجب ان لا يكون فارغا',
            'email.required'=>'البريد الالكتروني يجب ان لا يكون فارغا',
            'email.email'=>'صيغة البريد الالكتروني غير صحيحة حاول مجددا',
            'email.unique'=>'حدث خطا الرجاء معاودة المحاولة',
            'password.required'=>'الرجاء ادخال كلمة المرور',
            'password.min'=>'كلمة المرور قصيرة يجب ان تتكون من 8 حروف علي الاقل',
            'password.string'=>'صغية كلمة المرور غير صحيحة الرجاء المحاولة مجددا',
        ];
    }

//    protected function prepareForValidation() {
//        $this->merge([
//            'password' => Hash::make($this->password),

//        ]);
//    }
    
}
