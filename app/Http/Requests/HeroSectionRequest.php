<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
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
            'hello_text'  => ['required'],
            'title'       => ['required'],
            'designation' => ['required','max:30'],
            'status'      => ['required'],
            'hero_image'  => 'required|mimes:png,jpg,jpeg|file'
        ];
        if(request()->hero_image !=null){
            $rules['hero_image']='required';
        }
        return $rules;
    }
}
