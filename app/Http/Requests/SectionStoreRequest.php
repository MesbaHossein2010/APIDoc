<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Adjust based on your authorization needs
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'documents' => 'nullable|array',
            'documents.*' => 'exists:documents,id', // Ensure the documents exist in the database
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages()
    {
        return [
            // Title messages
            'title.required' => 'عنوان بخش الزامی است.',
            'title.string'   => 'عنوان بخش باید به صورت متن باشد.',
            'title.max'      => 'عنوان بخش نمی‌تواند بیش از ۲۵۵ کاراکتر باشد.',

            // Documents messages
            'documents.array'      => 'لیست اسناد باید به صورت آرایه ارسال شود.',
            'documents.*.exists'  => 'سند(های) انتخاب شده در سیستم وجود ندارند.',
        ];
    }
}
