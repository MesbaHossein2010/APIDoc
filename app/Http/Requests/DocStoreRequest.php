<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocStoreRequest extends FormRequest
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
            'slug' => 'string|required|min:3|max:500|unique:documents,slug',
        ];
    }

    public function messages(): array
    {
        return [
            // Title messages
            'title.required' => 'عنوان سند الزامی است.',
            'title.string' => 'عنوان باید به صورت متن باشد.',
            'title.min' => 'عنوان باید حداقل ۳ کاراکتر باشد.',
            'title.max' => 'عنوان نمی‌تواند بیش از ۵۰ کاراکتر باشد.',

            // Content messages
            'content.required' => 'محتویات سند الزامی است.',
            'content.string' => 'محتوا باید به صورت متن باشد.',
            'content.min' => 'محتوا باید حداقل ۳ کاراکتر باشد.',
            'content.max' => 'محتوا نمی‌تواند بیش از ۶۵۳۳۰ کاراکتر باشد.',

            // Section messages
            'section_id.required' => 'انتخاب بخش الزامی است.',
            'section_id.integer' => 'شناسه بخش باید عددی باشد.',
            'section_id.exists' => 'بخش مورد نظر یافت نشد.',

            // Slug messages (using اسلاگ)
            'slug.required' => 'وارد کردن اسلاگ الزامی است.',
            'slug.string' => 'اسلاگ باید به صورت متن باشد.',
            'slug.min' => 'اسلاگ باید حداقل ۳ کاراکتر باشد.',
            'slug.max' => 'اسلاگ نمی‌تواند بیش از ۵۰۰ کاراکتر باشد.',
            'slug.unique' => 'این اسلاگ قبلاً استفاده شده است.',
        ];
    }
}
