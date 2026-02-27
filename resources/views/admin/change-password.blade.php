@extends('admin.layout')

@section('title', 'Change Password')

@section('content')
<div class="card" style="max-width: 480px;">
    <div class="card-title">&#x1F512; Change Password</div>

    <form method="POST" action="{{ route('admin.change-password.update') }}">
        @csrf

        <div class="form-group" style="margin-bottom: 16px;">
            <label for="current_password">Current Password</label>
            <input
                type="password"
                id="current_password"
                name="current_password"
                placeholder="Enter current password"
                autocomplete="current-password"
            >
            @error('current_password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group" style="margin-bottom: 16px;">
            <label for="new_password">New Password</label>
            <input
                type="password"
                id="new_password"
                name="new_password"
                placeholder="Minimum 6 characters"
                autocomplete="new-password"
            >
            @error('new_password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="new_password_confirmation">Confirm New Password</label>
            <input
                type="password"
                id="new_password_confirmation"
                name="new_password_confirmation"
                placeholder="Re-enter new password"
                autocomplete="new-password"
            >
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Password</button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
