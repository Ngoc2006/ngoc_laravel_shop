<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //ktra xem ng dungf cos quyeenf thuuc hien thao tac luu hay sua ko
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:10|max:255',
            'origin_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute Không được để trống',
            'min' => ':attribute Không được nhỏ hơn :min',
            'max' => ':attribute Không được lớn hơn :max'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'origin_price' => 'Giá gốc',
            'sale_price' => 'Giá bán'
        ];
    }
}
