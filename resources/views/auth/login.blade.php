@extends('layouts.auth')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inventaris Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: #fff;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: #DB0000;
            border: none;
            transition: background 0.3s;
        }
        .btn-primary:hover {
            background: rgb(190, 0, 0);
        }
        a {
            color: #6a11cb;
            text-decoration: none;
        }
        a:hover {
            color: #2575fc;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card p-5 bg-light text-dark" style="width: 400px;">
            <h3 class="text-center mb-4">Selamat Datang</h3>
            @if (session('success'))
         <div class="alert alert-success">
           {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                <div class="text-center">
                    <a href="{{ route('register') }}" class="btn btn-link">Don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
@endsection