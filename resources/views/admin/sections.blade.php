@extends('layouts.admin')

@section('title', 'Manage Sections')

@section('content')
    <a href="#" class="button">Add Section</a>

    <table class="table">
        <thead>
        <tr>
            <th>Section Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Example -->
        <tr>
            <td>Authentication</td>
            <td>
                <a href="#">Edit</a> | <a href="#">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
