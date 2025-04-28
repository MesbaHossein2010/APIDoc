@extends('layouts.admin')

@section('title', 'Changelog')

@section('content')
    <a href="#" class="button">Add Entry</a>

    <table class="table">
        <thead>
        <tr>
            <th>Version</th>
            <th>Date</th>
            <th>Changes</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>v1.2.0</td>
            <td>2025-04-27</td>
            <td>Added new Authentication endpoints</td>
            <td>
                <a href="#">Edit</a> | <a href="#">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
