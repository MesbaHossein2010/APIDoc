@extends('layouts.admin')

@section('title', 'Create Document')

@section('content')
    <form method="POST" action="#">
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" name="title" type="text" required>
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <select id="section" name="section" required>
                <option value="">Select Section</option>
                <option value="auth">Authentication</option>
                <option value="errors">Errors</option>
            </select>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" rows="10" required></textarea>
        </div>

        <button type="submit" class="button">Save</button>
    </form>
@endsection
