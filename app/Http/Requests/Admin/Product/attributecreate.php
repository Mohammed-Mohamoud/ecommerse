<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class attributecreate extends FormRequest
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
             'attribute_id'=>'exists:attributes,id|required',
             'attribute'=>'string|min:2|max:20|required',
             'price'=>'numeric',
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
         'numeric'=>'ادخل ارقام فقط',
        ];
    }
}
