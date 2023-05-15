<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
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
            'name' =>'required|max:100',
            'email' =>'required|unique:users|email',
            'password' =>'required|min:6',
            'premission' =>'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'name is required',
            'name.max' =>'name is max 100',
            'email.required' =>'email is required',
            'email.unique' =>'email is Existing',
            'email.email' =>'email is must be email',
            'password.required' =>'password is required',
            'password.min' =>'password must min 6',
            'premission.required' =>'premission is required',

        ];
    }
}
