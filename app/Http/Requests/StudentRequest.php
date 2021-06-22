<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name'                 => ['required','string','max:255','min:9'],
            'phone_number'         => ['required','integer','min:8'],
            'email'                => ['email','max:255'],
            'stage'                => ['integer'],
        ];
    }

    public function messages(){
        return [
            'name.required'=>'اسم الطالب مطلوب',
            'name.string'=>'اسم الطالب   يجب ان يكون نصا',
            'name.max'=>'اسم الطالب اكبر من المطلوب',
            'name.min'=>'اسم الطالب قصيرا',
            'phone_number.required'=>'ادخل رقم هاتف الطالب',
            'phone_number.integer'=>'صيغة رقم الهاتف غير صحيحة',
            'phone_number.min'=>' رقم الهاتف  قصير',
            'email.email'=>'البريد الالكتروني غير صحيح ',
            'email.max'=>'البريد الالكتروني اطول من المسموح',
            'stage.integer'=>'رقم  ',
            'stage.max'=>'غير مطابق',
        ];
    }
    
    protected function prepareForValidation(){
        $this->merge([
            'phone_number'=>(int) $this->phone_number,
            'stage' => (int) $this->stage,
        ]);
    }
}
