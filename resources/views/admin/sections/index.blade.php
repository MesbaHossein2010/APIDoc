@extends('layouts.admin')

@section('title', 'مدیریت بخش‌ها')

<style>
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        direction: rtl;
    }

    .btn-create {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background-color: #2563eb;
        color: white;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-weight: 500;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .btn-create:hover {
        background-color: #1e40af;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #1a1a1a;
        border-radius: 8px;
        overflow: hidden;
        direction: rtl;
        color: #e0e0e0;
    }

    .admin-table th,
    .admin-table td {
        padding: 1rem;
        text-align: right;
        border-bottom: 1px solid #333;
    }

    .admin-table th {
        background-color: #121212;
        color: #f9fafb;
    }

    .admin-table tbody tr:hover {
        background-color: #222;
    }

    .actions {
        display: flex;
        align-items: center;
    }

    .action-buttons {
        display: flex;
        gap: 0.6rem;
    }

    .btn-action {
        color: #9ca3af;
        transition: color 0.2s;
    }

    .btn-action svg {
        width: 20px;
        height: 20px;
        stroke: currentColor;
    }

    .btn-view:hover {
        color: #22c55e;
    }

    .btn-edit:hover {
        color: #f59e0b;
    }

    .btn-delete:hover {
        color: #ef4444;
    }
</style>

@section('content')
    @error('error')
    <span style="color: red">{{ $message }}</span>
    @enderror

    @if(!isset($search))
        @php($search = null)
    @endif

    <div class="admin-header">
        <h1>مدیریت بخش‌ها</h1>
        <a href="{{ route('admin.sections.create') }}" class="btn-create">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            بخش جدید
        </a>
    </div>

    <table class="admin-table">
        <thead>
        <tr>
            <form action="{{ route('admin.sections.index') }}" method="POST">
                @csrf
                <th>
                    <input type="text" name="search" value="{{ $search }}" placeholder="جستجوی عنوان..."
                           style="width: 100%; background-color: #121212; color: #e0e0e0; border: 1px solid #333; border-radius: 6px; padding: 0.4rem;">
                </th>
                <th colspan="2">
                    <button type="submit"
                            style="background-color: #2563eb; color: white; padding: 0.4rem 0.8rem; border: none; border-radius: 6px; cursor: pointer;">
                        جستجو
                    </button>
                </th>
            </form>
        </tr>
        <tr>
            <th>عنوان</th>
            <th>تعداد مستند</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sections as $section)
            <tr>
                <td>{!! str_ireplace($search, "<span style='color: cyan;'>".$search."</span>", e($section->title)) !!}</td>
                <td>{{ $section->docs->count() == 0 ? 'ندارد' : to_persian_num($section->docs->count()) }}</td>
                <td class="actions">
                    <div class="action-buttons">
                        <a href="{{ route('admin.sections.show', $section->id) }}" class="btn-action btn-view" title="مشاهده">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </a>
                        <a href="{{ route('admin.sections.edit', $section->id) }}" class="btn-action btn-edit" title="ویرایش">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </a>
                        <button type="button" class="btn-action btn-delete" title="حذف"
                                onclick="location.href='{{ route('admin.sections.delete', $section->id) }}'"
                                style="background: none; border: none; padding: 0;">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path d="M3 6h18"></path>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
