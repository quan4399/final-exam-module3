<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'code' => 'required|unique:shops',
            'shop_name' => 'required|unique:shops',
            'phone' => 'required|numeric',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'manager' => 'required',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Không được để trống',
            'shop_name.required' => 'Không được để trống',
            'phone.required' => 'Không được để trống',
            'email.required' => 'Không được để trống',
            'address.required' => 'Không được để trống',
            'manager.required' => 'Không được để trống',
            'status.required' => 'Không được để trống',
            'code.unique' => 'Mã đã tồn tại',
            'phone.numeric' => 'Phải là số',
            'email.email' => 'Email không đúng định dạng',
        ];
}
}
