@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Admin Profile</h1>
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">
            {{ __('Your profile has been updated successfully.') }}
        </div>
    @endif
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ auth()->user()->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p class="card-text"><strong>Account Type:</strong> {{ auth()->user()->type }}</p>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
