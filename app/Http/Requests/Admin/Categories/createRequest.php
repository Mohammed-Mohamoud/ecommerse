<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
           'name'=>'required|string|min:2|max:30|unique:categories,name',
           'photo'=>'file|image',
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
           'unique'=>'هذا الصنف موجود فعلأ',
        ];
    }
}
