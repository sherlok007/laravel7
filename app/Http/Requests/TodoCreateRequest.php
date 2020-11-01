<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
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
            'buyer_name' => 'required',
            'consign_no' => 'max:15',
            'order_no' => 'required',
            'price' => 'numeric',
            'order_date' => 'date_format:Y-m-d',
        ];
    }

    public function messages()
    {
        return [
            'buyer_name.required' => 'Please enter the buyer name',
            'consign_no.required' => 'Please enter the consignment number',
            'order_no.required' => 'Please enter the order number',
            'consign_no.max' => 'The title should not exceed 255 chars',
        ];
    }
}
