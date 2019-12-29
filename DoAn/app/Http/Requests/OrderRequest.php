<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'startTime' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'endTime' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^', 'after:startTime'],
        ];
    }

    public function messages()
    {
        return [
            'endTime.after' => 'Thời gian kết thúc phải lớn hơn thời gian bắt đầu ít nhất 30 phút.',
            'startTime.regex' => 'Thời gian bắt đầu sai định dạng',
            'endTime.regex' => 'Thời gian kết thúc sai định dạng',
            'startTime.required' => 'Thời gian bắt đầu không được để trống',
            'endTime.regex' => 'Thời gian kết thúc không được để trống',
        ];
    }
}
