<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinishCheckOut extends FormRequest
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
        $rules = [
            'location' => 'required|min:1|max:1024',
            'DiaChi' => 'required|min:3',
            'phone' => 'required|min:10',
            'methodPay'=>'required',
        ];

        return $rules;
    }
    public function messages(){
        return [
            'location.required' => 'Tỉnh/ Thành phố không được để trống',
            'DiaChi.required'=>'Đia Chỉ không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',
            'phone.min'=>'Không phải số điện thoại',
            'methodPay.required'=>'Phương thức thanh toán không được để trống'
        ];
    }
//    public function getData()
//    {
//        $data = $this->only(['idUser','idHoaDon','Ten','DiaChi','ThanhPho','sdt']);
//        return $data;
//    }
}
