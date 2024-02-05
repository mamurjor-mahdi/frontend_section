<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class mapaddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location_title' => 'required',
            'address'        => 'required',
            'number_title'   => 'required',
            'number'         => 'required',
            'email_title'    => 'required',
            'email'          => 'required',
            'map_url'        => 'required',
            'status'         => 'required',
        ];
    }
}
