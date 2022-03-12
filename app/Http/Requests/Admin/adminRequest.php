<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class adminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
         'frist_name'=>'required|string|max:15|min:2|',
         'last_name'=>'required|string|max:15|min:2|',
          ];
    }
    public function messages()
    {
        return [
         'required'=>'هذا الحقل مطلوب',
         'string'=>'لا مكن استخدام هذا الاسم',
          'max'=>'هذا الحقل اطول من المطلوب 15',
          'min'=>'هذا الحقل اقصر من المطلوب',
        ];
    }
}
