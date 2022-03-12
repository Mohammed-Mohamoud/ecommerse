<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class profile_create_login extends FormRequest
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
         'email'=>'required|email|min:10|max:25|exists:dashboards,email',
         'password'=>'required|string|min:5|max:20',
        ];
    }
    public function messages()
    {
        return [
         'required'=>'هذا الحقل مطلوب',
         'string'=>'لا يمكن استخدام هذا الاسم',
          'password.max'=>'كلمة مرور طويلة ',
          'password.min'=>'كلمة مرور غير صالحة',
          'exists'=>'هناك خطأ في البريد',
          'email.email'=>'هذاالبريد غير صالح',
          'email.max'=>'هذا البريد غير صالح ',
          'email.min'=>'هذا البريد غير صالح',
        ];
    }
}
