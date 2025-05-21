@extends('layouts.admin')

@section('title', 'نمایش مستند')

@section('content')
    <div class="doc-view" style="padding: 32px; max-width: 900px; margin: 0 auto; direction: rtl;">
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
            <h1 style="font-size: 24px; font-weight: 600;">{{ $doc->title }}</h1>
            <a href="{{ route('admin.docs.edit', $doc->id) }}"
               style="padding: 8px 16px; background-color: #2e7dff; color: #fff; text-decoration: none; border-radius: 4px;">
                ویرایش
            </a>
        </header>

        <div style="color: #aaa; font-size: 14px; margin-bottom: 16px;">
            <strong>پیوند یکتا:</strong> {{ $doc->slug }}
            <br>
            <strong>بخش:</strong> {!! $doc->section->title ?? '<strong style="color: red">بدون بخش</strong>' !!}
        </div>

        <article class="doc-content" style="line-height: 1.8; font-size: 16px; color: #e0e0e0; background: #1f1f1f; padding: 24px; border-radius: 12px;">
            {!! $doc->content !!}
        </article>
    </div>
@endsection
