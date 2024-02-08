<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class homePageCommonSectionReqest extends FormRequest
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
        $rules= [
            'service_title'          => 'required',
            'whychoose_title'        => 'required',
            'portfolio_title'        => 'required',
            'testmonial_title'       => 'required',
            'blogs_title'            => 'required',
            'contact_title'          => 'required',
            'service_description'    => 'required',
            'whychoose_description'  => 'required',
            'testmonial_description' => 'required',
            'blogs_description'      => 'required',
            'portfolio_description'  => 'required',
            'contact_description'    => 'required',
            'status'                 => 'required',
        ];
        return $rules;
    }
}
