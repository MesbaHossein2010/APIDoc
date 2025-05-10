@extends('layouts.admin')

@section('title', 'Edit Section')

<style>
    .checkbox-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #e0e0e0;
    }

</style>

@section('content')
    <div class="form-container">
        <div class="form-header">
            <h2>Edit</h2>
        </div>

        <form action="{{ route('admin.sections.update', $section->id) }}" method="POST">
            @csrf

            <div class="form-row">
                <label for="title" class="form-label">Section Title</label>
                <input type="text" name="title" id="title" class="form-input" placeholder="e.g. API Reference"
                       value="{{ old('title', $section->title) }}">
                @error('title')
                <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <label class="form-label">Assign Documents</label>
                <div class="checkbox-group">
                    @foreach ($documents as $document)
                        <label class="checkbox-label">
                            <input
                                type="checkbox"
                                name="documents[]"
                                value="{{ $document->id }}"
                                @if (in_array($document->id, old('documents', $section->docs->pluck('id')->toArray()))) checked @endif
                            >
                            {{ $document->title }}
                        </label>
                    @endforeach
                </div>
                @error('documents')
                <div class="form-error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-actions">
                <button type="submit" class="btn-form btn-save">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         style="margin-right: 8px;">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Edit Section
                </button>
                <a href="{{ route('admin.sections.index') }}" class="btn-form btn-cancel">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
