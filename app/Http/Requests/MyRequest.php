<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyRequest extends FormRequest
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
                'title' => 'required',
                'description' => 'required',
                'definition' =>'required',
                'mota' => 'required',
            ];

    }
    public function messages(): array
    {
        return [
           'title.required'=>'Ban chua nhap ten title',
           'description.required'=>'Ban chua nhap description',
           'definition.required'=>'Ban chua nhap ten definitionC',
           'mota.required'=>'Ban chua nhap ten mota',
        ];
    }
}
