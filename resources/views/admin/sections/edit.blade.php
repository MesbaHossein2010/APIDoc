@extends('layouts.admin')

@section('title', 'ویرایش بخش')

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
    <div class="form-container" style="direction: rtl; color: #e0e0e0;">
        <div class="form-header">
            <h2>ویرایش بخش</h2>
        </div>

        <form action="{{ route('admin.sections.update', $section->id) }}" method="POST">
            @csrf

            <div class="form-row">
                <label for="title" class="form-label">عنوان بخش</label>
                <input type="text" name="title" id="title" class="form-input"
                       placeholder="مثلاً: مستندات API"
                       value="{{ old('title', $section->title) }}"
                       style="background-color: #121212; border: 1px solid #333; color: #e0e0e0;">
                @error('title')
                <div class="form-error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">
                <label class="form-label">اختصاص دادن مستندها</label>
                <div class="checkbox-group">
                    @foreach ($documents as $document)
                        <label class="checkbox-label">
                            <input type="checkbox" name="documents[]" value="{{ $document->id }}"
                                   @if (in_array($document->id, old('documents', $section->docs->pluck('id')->toArray()))) checked @endif>
                            {{ $document->title }}
                        </label>
                    @endforeach
                </div>
                @error('documents')
                <div class="form-error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions" style="margin-top: 1.5rem; display: flex; gap: 1rem;">
                <button type="submit" class="btn-form btn-save"
                        style="background-color: #2563eb; color: white; padding: 0.5rem 1rem; border-radius: 6px; border: none; display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" style="margin-left: 8px;">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    ذخیره تغییرات
                </button>
                <a href="{{ route('admin.sections.index') }}"
                   class="btn-form btn-cancel"
                   style="background-color: #374151; color: white; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none;">
                    بازگشت
                </a>
            </div>
        </form>
    </div>
@endsection
