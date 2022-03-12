<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class productCreate extends FormRequest
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
            'selling' => 'required|numeric',
            'quantity' => 'numeric',
            'price' => 'required|numeric',
            'special_price' => 'numeric|nullable|required_with:special',
            'price_type' => 'required_with:special',
            'price_star' => 'required_with:special|nullable|date_format:Y-m-d',
            'price_end' => 'required_with:special|nullable|date_format:Y-m-d',
            'name' => 'required|max:50|min:2',
            'brand_id'=>'exists:brands,id',
            'category_id'=>'exists:categories,id',
            'tage_id'=>'exists:tages,id',
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
