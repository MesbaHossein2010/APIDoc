<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocEditRequest extends FormRequest
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
            'title' => 'string|required|min:3|max:50',
            'content' => 'string|required|min:3|max:65330',
            'section_id' => 'integer|required|exists:sections,id',
            'slug' => [
                'string',
                'required',
                'min:3',
                'max:50',
                Rule::unique('documents', 'slug')->ignore($this->route('id')), // assuming route model binding
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.min' => 'title must be at least 3 characters long',
            'title.max' => 'title cannot exceed 50 characters long',
            'content.min' => 'content must be at least 3 characters long',
            'content.max' => 'content cannot exceed 500 characters long',
            'section_id.exists' => 'section not found',
            'slug.min' => 'slug must be at least 3 characters long',
            'slug.max' => 'slug cannot exceed 500 characters long',
            'slug.unique' => 'slug already used',
        ];
    }
}
