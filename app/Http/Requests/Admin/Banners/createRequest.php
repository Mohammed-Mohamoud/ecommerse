<?php

namespace App\Http\Requests\Admin\Banners;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name'=>'required|string|min:3|max:250',
            'photo'=>'required|file',
            'address'=>'required|min:3|max:50|string',
            'slug'=>'required|min:3|max:250|string',

        ];
    }
    public function messages()
    {
        return [
            'required'=>'هذا الحقل مطلوب',
           'string'=>'من فضلك استخدم اسم صنف اخر',
           'min'=>'ادخل صنف حقيقي من فضلك',
           'max'=>'هذا الحقل كبير جدأ',
           'image'=>'هذه ليست صورة',
           'file'=>'هذا ليس ملف حقيقي',
        ];
    }
}
