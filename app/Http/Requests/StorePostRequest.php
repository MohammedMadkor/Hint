<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'tittle' =>'required',
            'image' =>'required|mimes:png,jpg',
            'cat_id' =>'required',
            'content' =>'required',
            'user_id' =>'required',
            'imageMedia' => 'mimes:png,jpg'
        ];
    }
    public function messages()
    {
        return [
            'tittle.required' =>'tittle is required',
            'image.required' =>'image is required',
            'image.mimes' =>'image is must be png,jpg',
            'cat_id.required' =>'cat_id is required',
            'content.required' =>'content is required',
            'user_id.required' =>'user_id is required',
            'imageMedia.required' => 'imageMedia must be png,jpg ',
        ];
    }
}
