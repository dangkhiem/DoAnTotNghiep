<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePitchRequest extends FormRequest
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
            'name' => 'required | string ',
            'area' => 'required |string',
            'address' => 'required | string',
            'img' => 'required | image | mimes:jpeg,png,jpg,gif|max:2048',
            'open_time' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'close_time' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^']
        ];
    }
}
