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
                'max:100',
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
}
