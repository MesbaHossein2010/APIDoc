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
            'title.required' => 'عنوان بخش الزامی است.',
            'title.string' => 'عنوان بخش باید به صورت متن باشد.',
            'title.max' => 'عنوان بخش نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',
            'documents.array' => 'سندها باید به صورت آرایه ارسال شوند.',
            'documents.*.exists' => 'یک یا چند سند انتخاب شده معتبر نیستند.',
        ];
    }
}
