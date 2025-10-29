<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeTaskRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:120',
                'min:6',
            ],
            'description' =>[
                'nullable',
                'max:1000',
                'min:18',
            ],
            'image' => [
                'nullable',
                'file',
                'mimes:png,jpg,jpeg',
                'max:2048'
            ]
        ];
    }

    //custom error msg show
     public function messages(): array
     {
        return[
            'title.required' => 'title dite hobe',
            'title.min' => 'min 6 charcter dite hobe',
            'title.max' => 'max 120 chrcter',
            'description.min' => 'min 18 charcter dite hobe',
            'description.max' => 'max 100 charcter deuya jabe',
            'image.mimes' => 'image dite hobe'
        ];
     }

     // trim 
     public function prepareForValidation(): void
        {
            $this->merge([
                'title' => trim((string) $this->input('title')),
                'description' => trim((string) $this->input('description')),
            ]);
        }

}
