<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequestPrice extends FormRequest
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
            'cost' =>'required | numeric | min:1',
            'start_time' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'end_time' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^']
        ];
    }
}
