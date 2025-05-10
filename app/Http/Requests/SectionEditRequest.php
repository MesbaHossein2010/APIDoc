<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionEditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Adjust this if using policies
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'documents' => 'nullable|array',
            'documents.*' => 'exists:documents,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The section title is required.',
            'title.max' => 'The section title must not exceed 255 characters.',
            'documents.*.exists' => 'One or more selected documents are invalid.',
        ];
    }
}
