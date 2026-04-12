<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Al Munawwara Islamic School') }} - Student Portal</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-green: #2d7d32;
            --secondary-green: #388e3c;
            --light-green: #4caf50;
            --dark-green: #1b5e20;
            --accent-green: #66bb6a;
            --text-dark: #1b1b18;
            --text-light: #6c757d;
            --bg-light: #f8f9fa;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }
        
        .navbar-brand {
            font-weight: 600;
            color: var(--primary-green) !important;
        }
        
        .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-green);
            border-color: var(--secondary-green);
        }
        
        .btn-outline-primary {
            color: var(--primary-green);
            border-color: var(--primary-green);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }
        
        .text-primary {
            color: var(--primary-green) !important;
        }
        
        .bg-primary {
            background-color: var(--primary-green) !important;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(45, 125, 50, 0.1);
            box-shadow: 0 4px 24px rgba(45, 125, 50, 0.08);
            padding: 0.6rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .school-logo-img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(45, 125, 50, 0.2);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover .school-logo-img {
            transform: rotate(10deg) scale(1.05);
        }

        .logo-main {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary-green);
            letter-spacing: 0.3px;
            line-height: 1.2;
        }

        .logo-sub {
            font-size: 0.7rem;
            font-weight: 500;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            font-size: 0.9rem;
            color: #444 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 10px;
            transition: all 0.25s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-green) !important;
            background: rgba(45, 125, 50, 0.07);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-green) !important;
            background: rgba(45, 125, 50, 0.1);
        }

        .nav-link-pill {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green)) !important;
            color: white !important;
            border-radius: 50px !important;
            padding: 0.45rem 1.2rem !important;
            font-weight: 600 !important;
            font-size: 0.85rem !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 12px rgba(45, 125, 50, 0.25);
        }

        .nav-link-pill:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(45, 125, 50, 0.35) !important;
            color: white !important;
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green)) !important;
        }

        .nav-link-ghost {
            border: 1.5px solid rgba(45, 125, 50, 0.4) !important;
            color: var(--primary-green) !important;
            border-radius: 50px !important;
            padding: 0.4rem 1.1rem !important;
            font-weight: 600 !important;
            font-size: 0.85rem !important;
            transition: all 0.3s ease !important;
        }

        .nav-link-ghost:hover {
            background: rgba(45, 125, 50, 0.07) !important;
            border-color: var(--primary-green) !important;
            transform: translateY(-1px);
        }

        .dropdown-menu {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            padding: 0.5rem;
            min-width: 200px;
            animation: dropIn 0.2s ease;
        }

        @keyframes dropIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dropdown-item {
            border-radius: 10px;
            padding: 0.6rem 1rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: #444;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: rgba(45, 125, 50, 0.08);
            color: var(--primary-green);
        }

        .dropdown-divider {
            margin: 0.4rem 0.5rem;
            border-color: rgba(0,0,0,0.06);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: 700;
            margin-right: 0.5rem;
        }

        .navbar-toggler {
            border: 1.5px solid rgba(45, 125, 50, 0.3);
            border-radius: 10px;
            padding: 0.4rem 0.6rem;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(45, 125, 50, 0.15);
        }
    </style>
</head>
<body>
    <div id="app">
        @unless(View::hasSection('hide_navbar'))
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="logo-container">
                        <img src="{{ asset('images/logo/AMIS_Logo.png') }}" alt="AMIS Logo" class="school-logo-img">
                        <div class="logo-text">
                            <div class="logo-main">AMIS Portal</div>
                            <div class="logo-sub">Al Munawwara Islamic School</div>
                        </div>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ms-3">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">
                                    <i class="fas fa-home me-1"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('courses') }}">
                                    <i class="fas fa-book me-1"></i> Courses
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('schedule') }}">
                                    <i class="fas fa-calendar me-1"></i> Schedule
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('grades') }}">
                                    <i class="fas fa-chart-line me-1"></i> Grades
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <ul class="navbar-nav ms-auto align-items-center gap-2">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link nav-link-ghost" href="{{ route('login') }}">
                                        <i class="fas fa-sign-in-alt me-1"></i> Login
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link nav-link-pill" href="{{ route('register') }}">
                                        <i class="fas fa-user-plus me-1"></i> Register
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                    <span class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user me-2 text-primary"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cog me-2 text-primary"></i> Settings
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endunless

        <main>
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>