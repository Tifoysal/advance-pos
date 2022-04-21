<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

//        if(auth()->user()->role_id==1)
//        {
//            return true;
//        }
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
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
        ];
    }
//
//    public function attributes()
//    {
//        return [
//            'mobile' => 'Nice Name',
//        ];
//    }
}

