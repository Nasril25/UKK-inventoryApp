<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: 'Arial', sans-serif;
        }
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: url('https://source.unsplash.com/1600x900/?technology,code') no-repeat center center / cover;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .register, .login {
            border-radius: 30px;
            padding: 10px 25px;
            font-size: 1.1rem;
            transition: 0.3s;
        }
        .register {
            background-color: #DB0000;
            color: #ffffff;
            border: none;
        }
        .register:hover {
            background-color: rgb(148, 7, 7);
            color: rgb(153, 133, 133);
        }
        .login {
            background-color: transparent;
            color: #DB0000;
            border: 2px solid #DB0000;
        }
        .login:hover {
            background-color: #DB0000;
            color: #ffffff;
        }
        footer {
            background-color: #831010;
            color: #ffffff;
            padding: 20px 0;
        }
        footer a {
            color: #ffffff;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        span {
            color: #DB0000;
        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="display-4 fw-bold">Selamat datang di Web <span>Inventaris Barang</span></h1>
            <p class="lead">Kelola Barang dengan Mudah, Akurat, dan Efisien.</p>
            <div class="mt-4">
                @auth
                @else
                    <a href="{{ route('login') }}" class="btn login me-2">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn register">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <footer class="text-center py-4">
        <p class="mb-0">© Copyright {{ date('Y') }} by Nasril</p>
        <p class="mb-0"><a href="https://github.com/Nasril25" target="_blank">GitHub</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
