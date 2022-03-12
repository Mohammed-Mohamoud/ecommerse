<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class passwordRequest extends FormRequest
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
            'password' => 'required|string|max:20|min:5',
            'password_confirmation' => 'required_with:password|same:password',

        ];
    }
    public function messages()
    {
        return [
         'required'=>'هذا الحقل مطلوب',
         'string'=>'لا مكن استخدام هذا الاسم',
          'max'=>'هذا الحقل اطول من المطلوب 20',
          'min'=>'هذا القل اقصر من المطلوب',
          'same'=>'كلمة المرور غير متطابقة',
          'required_with'=>'هذا الحقل مطلوب',
        ];
    }
}
