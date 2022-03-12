<?php

namespace App\Http\Requests\Admin\Banners;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:250',
            'photo'=>'file',
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
