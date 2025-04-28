@extends('layouts.admin')

@section('title', 'Documents')

@section('content')
    <a href="{{ route('admin.docs.create') }}" class="button">Add New Doc</a>

    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Section</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Example Row -->
        <tr>
            <td>Authentication API</td>
            <td>Authentication</td>
            <td>2025-04-28</td>
            <td>
                <a href="#">Edit</a> | <a href="#">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
