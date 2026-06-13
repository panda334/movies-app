<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequesMovie extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],               
            'story'       => ['required', 'string'],
            'language'    => ['required', 'string', 'max:100'],
            'length'      => ['required', 'numeric', 'min:1'],    
            'date'        => ['required', 'date'],                 
            'rate'        => ['required', 'numeric', 'min:0', 'max:10'],
            'image'       => ['nullable', 'image', 'max:5120'],   
            'cast_id'     => ['nullable', 'array'],                
            'cast_id.*'   => ['exists:casts,id'],                  
            'category_id'   => ['nullable', 'array'],              
            'category_id.*' => ['exists:categories,id'],           
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Movie name is required.',
            'story.required'    => 'Story is required.',
            'language.required' => 'Language is required.',
            'length.numeric'    => 'Length must be a number (in minutes).',
            'rate.max'          => 'Rate cannot exceed 10.',
            'image.image'       => 'The file must be an image.',
            'image.max'         => 'Image size cannot exceed 5MB.',
        ];
    }
}
