@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h1>Edit Profile</h1>
    <a href="{{ route('user.profile.show') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('user.profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
        </div>

        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password" required>
            @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Leave blank to keep current password">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success mt-3">
            {{ __('Profile updated successfully.') }}
        </div>
    @endif

    @if (session('status') === 'password-updated')
        <div class="alert alert-success mt-3">
            {{ __('Password updated successfully.') }}
        </div>
    @endif
</div>
@endsection
