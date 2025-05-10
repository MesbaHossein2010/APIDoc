@extends('layouts.admin')

@section('title', 'Create Document')

@push('styles')
    <style>
        /* Dark Mode Styles */
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
            border-color: #4f46e5; /* Indigo */
            outline: none;
        }

        .form-textarea {
            min-height: 300px;
            background-color: #333;
            color: #ffffff;
        }

        .form-error {
            color: #dc2626; /* Red */
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

        /* CKEditor content area */
        .ck-editor__editable_inline {
            min-height: 250px;
            border-radius: 8px;
            padding: 1rem;
            background-color: #333 !important;
            color: #ffffff !important;
        }

        /* CKEditor Toolbar - Dark Mode */
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

        /* Additional CKEditor styling for dark mode */
        .ck-content {
            background-color: #333 !important;
            color: #fff !important;
        }

        /* More specific CKEditor Toolbar targeting for dark theme */
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
@endpush

@section('content')
    <div class="form-container">
        <div class="form-header">
            <h2>Create New Document</h2>
        </div>

        <form action="{{ route('admin.docs.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <label for="title" class="form-label">Document Title</label>
                <input type="text" id="title" name="title" class="form-input" placeholder="e.g. API Reference" value="{{ old('title') }}">
                @error('title')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="slug" class="form-label">URL Slug</label>
                <input type="text" id="slug" name="slug" class="form-input" placeholder="e.g. api-reference" value="{{ old('slug') }}">
                @error('slug')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="section_id" class="form-label">Section</label>
                <select name="section_id" id="section_id" class="form-input">
                    <option value="0">-- No section --</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}" {{ old('section_id') == $section->id ? 'selected' : '' }}>
                            {{ $section->title }}
                        </option>
                    @endforeach
                </select>
                @error('section_id')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-row">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-input form-textarea">{{ old('content') }}</textarea>
                @error('content')
                <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-form btn-save">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                        <polyline points="17 21 17 13 7 13 7 21"/>
                        <polyline points="7 3 7 8 15 8"/>
                    </svg>
                    Create Document
                </button>
                <a href="{{ route('admin.docs.index') }}" class="btn-form btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection

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
                .catch(error => {
                    console.error('CKEditor init failed:', error);
                });
        });
    </script>
@endpush
