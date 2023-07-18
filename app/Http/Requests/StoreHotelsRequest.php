<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
            'owner' => [
                'required',
            ],
            'sr_no' => [
                'required',
            ],
            'total_room' => [
                'required',
            ],
            'phone' => [
                'required',
            ],
            'address' => [
                'required',
            ],
            'zone_id' => [
                'required',
            ],
        ];
    }
}
