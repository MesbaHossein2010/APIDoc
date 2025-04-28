@extends('layouts.admin')

@section('title', 'Profile Settings')

@section('content')
    <form method="POST" action="#">
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="Admin User" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="admin@example.com" required>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" name="password" type="password">
        </div>

        <button type="submit" class="button">Update Profile</button>
    </form>
@endsection
