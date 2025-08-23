@extends('layouts.admin')

@section('title', 'View Documentation')

@section('content')
    <div class="doc-view" style="padding: 32px; max-width: 900px; margin: 0 auto;">
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h1 style="font-size: 24px; font-weight: 600;">{{ $doc->title }}</h1>
            <a href="{{ route('admin.docs.edit', $doc->id) }}"
               style="padding: 8px 16px; background-color: #2e7dff; color: #fff; text-decoration: none; border-radius: 4px;">
                Edit
            </a>
        </header>

        <div style="color: #666; font-size: 14px; margin-bottom: 16px;">
            <strong>Slug:</strong> {{ $doc->slug }}
            <br>
            <strong>Section:</strong> {!! $doc->section == null?'<strong style="color: red;">No section selected</strong>':$doc->section->title !!}
        </div>

        <article class="doc-content">
            {!! $doc->content !!}
        </article>
    </div>
@endsection
