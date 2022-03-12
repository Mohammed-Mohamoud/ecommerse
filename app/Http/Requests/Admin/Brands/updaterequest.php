<?php

namespace App\Http\Requests\Admin\Brands;

use Illuminate\Foundation\Http\FormRequest;

class updaterequest extends FormRequest
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
            'name'=>'required|string|min:2|max:30',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'هذا الحقل مطلوب',
            'string'=>'من فضلك استخدم اسم صنف اخر',
            'min'=>'ادخل صنف حقيقي من فضلك',
            'max'=>'هذا الحقل كبير جدأ',
        ];
    }
}
