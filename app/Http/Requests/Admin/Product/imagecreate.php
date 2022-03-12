<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class imagecreate extends FormRequest
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
            'photos' => 'required|array',
            'id' => 'required|exists:products,id',
        ];
    }
    public function messages()
    {
        return [
        'exists'=>'هذا الحقل موجود مسبقأ',
        'required'=>'هذا الحقل مطلوب',
        ];
    }
}
