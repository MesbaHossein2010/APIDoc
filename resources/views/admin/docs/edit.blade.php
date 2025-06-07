@extends('layouts.admin')

@section('title', 'ویرایش سند')

@section('content')
    <div class="form-container">
        <div class="form-header">
            <h2>ویرایش سند</h2>
        </div>

        <form method="POST" action="{{ route('admin.docs.update', $doc->id) }}">
            @csrf

            <div class="form-row">
                <label for="title" class="form-label">عنوان سند</label>
                <input name="title" value="{{ $doc->title }}" type="text" id="title" class="form-input"
                       placeholder="مثلاً: مستندات API">
                @error('title')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="slug" class="form-label">اسلاگ آدرس</label>
                <input name="slug" value="{{ $doc->slug }}" type="text" id="slug" class="form-input"
                       placeholder="مثلاً: api-reference">
                @error('slug')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="section_id" class="form-label">بخش</label>
                <select name="section_id" id="section_id" class="form-input">
{{--                    <option value="0">-- بدون بخش --</option>--}}
                    @foreach ($sections as $sت ection)
                        <option value="{{ $section->id }}"
                            {{ $doc->section && $doc->section->id == $section->id ? 'selected' : '' }}>
                            {{ $section->title }}
                        </option>
                    @endforeach
                </select>
                @error('section_id')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="content" class="form-label">محتوا</label>
                <textarea name="content" id="content" class="form-input form-textarea"
                          placeholder="محتوای سند را وارد کنید">{{ old('content', $doc->content) }}</textarea>
                @error('content')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-form btn-save">
                    ویرایش سند
                </button>
                <a href="{{ route('admin.docs.index') }}" class="btn-form btn-cancel">انصراف</a>
            </div>
        </form>
    </div>
@endsection

<style>
    body {
        background-color: #121212;
        color: #e0e0e0;
    }

    .form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: #1f1f1f;
        border-radius: 16px;
        box-shadow: 0 0 16px rgba(0, 0, 0, 0.2);
    }

    .form-header h2 {
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        color: #ffffff;
    }

    .form-label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #d1d5db;
    }

    .form-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: 1px solid #444;
        font-size: 1rem;
        margin-bottom: 1rem;
        background-color: #333;
        color: #ffffff;
        transition: border-color 0.3s;
    }

    .form-input:focus {
        border-color: #4f46e5;
        outline: none;
    }

    .form-textarea {
        min-height: 300px;
        background-color: #333;
        color: #ffffff;
    }

    .form-error {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: -0.5rem;
        margin-bottom: 1rem;
    }

    .btn-form {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.25rem;
        font-size: 1rem;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.2s;
    }

    .btn-save {
        background-color: #4f46e5;
        color: white;
        border: none;
    }

    .btn-save:hover {
        background-color: #4338ca;
    }

    .btn-cancel {
        background-color: #444;
        color: #e0e0e0;
        margin-left: 1rem;
    }

    .btn-cancel:hover {
        background-color: #555;
    }

    .ck-editor__editable_inline {
        min-height: 250px;
        border-radius: 8px;
        padding: 1rem;
        background-color: #333 !important;
        color: #ffffff !important;
    }

    .ck.ck-toolbar {
        background-color: #444 !important;
        border-color: #555 !important;
        color: #ffffff !important;
    }

    .ck.ck-toolbar button {
        color: #e0e0e0 !important;
    }

    .ck.ck-toolbar button:hover {
        background-color: #555 !important;
    }

    .ck.ck-toolbar button.ck-button.ck-on:hover {
        background-color: #4f46e5 !important;
    }

    .ck-content {
        background-color: #333 !important;
        color: #fff !important;
    }

    .ck.ck-toolbar .ck-button {
        background-color: #444 !important;
        color: #e0e0e0 !important;
    }

    .ck.ck-toolbar .ck-button:hover {
        background-color: #555 !important;
    }

    .ck.ck-toolbar .ck-button.ck-on {
        background-color: #4f46e5 !important;
    }
</style>

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/super-build/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editorTarget = document.querySelector('#content');
            if (!editorTarget) {
                console.error('Textarea with id="content" not found.');
                return;
            }

            CKEDITOR.ClassicEditor
                .create(editorTarget, {
                    language: 'fa', // Optional: CKEditor UI in Persian if supported
                    contentsLangDirection: 'rtl', // Makes editor content RTL
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                            'code', 'codeBlock', '|',
                            'undo', 'redo'
                        ]
                    },
                    removePlugins: [
                        'CKBox', 'CKFinder', 'CKFinderUploadAdapter', 'EasyImage',
                        'RealTimeCollaborativeComments', 'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory', 'PresenceList', 'Comments',
                        'TrackChanges', 'TrackChangesData', 'RevisionHistory', 'Pagination',
                        'WProofreader', 'MathType', 'ImageUpload', 'ImageInsert',
                        'ImageToolbar', 'ImageCaption', 'ImageStyle', 'ImageResize',
                        'MediaEmbed', 'Table', 'TableToolbar', 'BlockQuote',
                        'DocumentOutline', 'TableOfContents', 'FormatPainter',
                        'Template', 'SlashCommand', 'PasteFromOfficeEnhanced'
                    ]
                })
                .then(editor => {
                    // Optional: enforce direction inside editable area
                    editor.editing.view.change(writer => {
                        writer.setAttribute('dir', 'rtl', editor.editing.view.document.getRoot());
                    });
                })
                .catch(error => {
                    console.error('CKEditor init failed:', error);
                });
        });
    </script>
@endpush
