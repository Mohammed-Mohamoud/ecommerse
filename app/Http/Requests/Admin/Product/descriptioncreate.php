<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class descriptioncreate extends FormRequest
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
            'product_id'=>'exists:products,id|required',
            'description'=>'required|min:5|max:300|string',

        ];
    }
    public function messages()
    {
        return [
        'exists'=>'هذا الحقل موجود مسبقأ',
        'required'=>'هذا الحقل مطلوب',
        'string'=>'ادخل نص حقيقي',
        'min'=>'هذا الحقل قصير',
         'max'=>'هذا الحقل اطول من المطلوب',
        ];
    }

}
