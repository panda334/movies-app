<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequesMovie extends FormRequest
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
            'name' => ['required'],
            'description' => ['nullable'],
            'story' => ['required'],
            'language' => ['required'],
            'length' => ['required'],
            'date' => ['date'],
            'rate' => ['required'],
            // 'cast_id' => ['nullable'],
            // 'category_id' => ['nullable'],
        ];
    }
}
