<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
           'post_id' =>'required',
           'comment' =>'required',
           'name' =>'required',
           'email' =>'required',

        ];
    }
    public function messages()
    {
        return [
           'post_id.required' =>'post_id is required',
           'comment.required' =>'comment is required ',
           'name.required' =>'name is required ',
           'email.required' =>'email is required ',

        ];
    }
}
