@extends('layouts.admin')

@section('title', 'Create Document')

@section('content')
    <div class="form-container">
        <div class="form-header">
            <h2>Edit</h2>
        </div>

        <form>
            <div class="form-row">
                <label for="title" class="form-label">Document Title</label>
                <input type="text" id="title" class="form-input" placeholder="e.g. API Reference">
            </div>

            <div class="form-row">
                <label for="slug" class="form-label">URL Slug</label>
                <input type="text" id="slug" class="form-input" placeholder="e.g. api-reference">
            </div>

            <div class="form-row">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="form-input form-textarea" placeholder="Enter section description"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-form btn-save">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Edit Document
                </button>
                <a href="{{ route('admin.docs.index') }}" class="btn-form btn-cancel">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
