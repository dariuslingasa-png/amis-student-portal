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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-green: #2d7d32;
            --secondary-green: #388e3c;
            --light-green: #e8f5e9;
            --dark-green: #1b5e20;
            --sidebar-width: 260px;
            --topbar-height: 70px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }

        .sidebar-header {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-logo {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            object-fit: cover;
        }

        .sidebar-brand {
            flex: 1;
        }

        .sidebar-brand-text {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-green);
            line-height: 1.2;
            margin: 0;
        }

        .sidebar-brand-sub {
            font-size: 0.65rem;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar-menu {
            padding: 1rem 0.75rem;
        }

        .menu-section {
            margin-bottom: 1.5rem;
        }

        .menu-section-title {
            font-size: 0.7rem;
            font-weight: 700;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 0.75rem;
            margin-bottom: 0.5rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 0.75rem;
            margin-bottom: 0.25rem;
            border-radius: 10px;
            color: #6b7280;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
        }

        .menu-item:hover {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .menu-item.active {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: white;
            box-shadow: 0 4px 12px rgba(45, 125, 50, 0.25);
        }

        .menu-item i {
            width: 20px;
            margin-right: 0.75rem;
            font-size: 1rem;
        }

        .menu-badge {
            margin-left: auto;
            background: #ef4444;
            color: white;
            font-size: 0.7rem;
            padding: 0.15rem 0.5rem;
            border-radius: 20px;
            font-weight: 600;
        }

        .menu-item.active .menu-badge {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Topbar Styles */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            z-index: 999;
            display: flex;
            align-items: center;
            padding: 0 2rem;
            transition: all 0.3s ease;
        }

        /* Adjust topbar for rejected students (no sidebar) */
        .topbar.no-sidebar {
            left: 0;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            border: none;
            background: var(--light-green);
            color: var(--primary-green);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .menu-toggle:hover {
            background: var(--primary-green);
            color: white;
        }

        .search-box {
            position: relative;
            width: 350px;
        }

        .search-box input {
            width: 100%;
            padding: 0.65rem 1rem 0.65rem 2.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            background: #f9fafb;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary-green);
            background: white;
            box-shadow: 0 0 0 3px rgba(45, 125, 50, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .topbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .topbar-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #f9fafb;
            border: none;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .topbar-icon:hover {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .topbar-icon .badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #ef4444;
            color: white;
            font-size: 0.65rem;
            padding: 0.15rem 0.4rem;
            border-radius: 10px;
            font-weight: 600;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0.75rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .user-menu:hover {
            background: #f9fafb;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: #1f2937;
            line-height: 1.2;
        }

        .user-role {
            font-size: 0.75rem;
            color: #9ca3af;
        }

        /* Grade Switcher Dropdown */
        .dropdown-menu {
            border: 1px solid #e5e7eb;
            padding: 0.5rem;
        }

        .dropdown-item {
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: var(--light-green);
            color: var(--primary-green);
        }

        .dropdown-item.active {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green));
            color: white;
        }

        .dropdown-item.active:hover {
            background: linear-gradient(135deg, var(--secondary-green), var(--primary-green));
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 2rem 3rem;
            min-height: calc(100vh - var(--topbar-height));
            transition: all 0.3s ease;
            padding-bottom: 5rem; /* Add space for bottom bar */
        }

        /* Adjust main content for rejected students (no sidebar) */
        .main-content.no-sidebar {
            margin-left: 0;
        }

        /* Bottom Bar Styles */
        .bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            padding: 1rem 2rem;
            z-index: 1001;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .bottom-bar-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }

        .bottom-bar-content {
            flex: 1;
            max-width: 800px;
        }

        .bottom-bar-title {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .bottom-bar-text {
            font-size: 0.85rem;
            opacity: 0.95;
            margin: 0;
        }

        .bottom-bar-close {
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bottom-bar-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                left: calc(var(--sidebar-width) * -1);
            }

            .sidebar.active {
                left: 0;
                box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.5);
            }

            .topbar {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .search-box {
                width: 200px;
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                padding: 0 1rem;
            }

            .search-box {
                display: none;
            }

            .main-content {
                padding: 1rem;
            }

            .bottom-bar {
                padding: 0.75rem 1rem;
                flex-wrap: wrap;
            }

            .bottom-bar-icon {
                width: 32px;
                height: 32px;
                font-size: 1rem;
            }

            .bottom-bar-title {
                font-size: 0.9rem;
            }

            .bottom-bar-text {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @if(Auth::check() && !Auth::user()->isRejected())
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/logo/AMIS_Logo.png') }}" alt="AMIS Logo" class="sidebar-logo">
            <div class="sidebar-brand">
                <div class="sidebar-brand-text">AMIS Portal</div>
                <div class="sidebar-brand-sub">Student Dashboard</div>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">Main Menu</div>
                <a href="{{ route('home') }}" class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <a href="{{ route('announcement') }}" class="menu-item {{ request()->routeIs('announcement') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn"></i>
                    Announcement
                </a>
                <a href="{{ route('grades') }}" class="menu-item {{ request()->routeIs('grades') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i>
                    Grades
                </a>
                <a href="{{ route('enrollment') }}" class="menu-item {{ request()->routeIs('enrollment') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    Subjects & Schedule
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Academic</div>
                <a href="#" class="menu-item">
                    <i class="fas fa-clipboard-list"></i>
                    Assignments
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    Calendar
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Resources</div>
                <a href="#" class="menu-item">
                    <i class="fas fa-book"></i>
                    Library
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-video"></i>
                    Lectures
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-file-alt"></i>
                    Documents
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-section-title">Account</div>
                <a href="#" class="menu-item">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
                <a href="{{ route('logout') }}" class="menu-item"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Topbar -->
    <div class="topbar {{ Auth::check() && Auth::user()->isRejected() ? 'no-sidebar' : '' }}">
        <div class="topbar-left">
            @if(Auth::check() && !Auth::user()->isRejected())
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            @else
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo/AMIS_Logo.png') }}" alt="AMIS Logo" style="width: 38px; height: 38px; border-radius: 10px;">
                <div>
                    <div style="font-weight: 700; color: var(--primary-green); font-size: 1rem;">AMIS Portal</div>
                    <div style="font-size: 0.7rem; color: #9ca3af;">Al Munawwara Islamic School</div>
                </div>
            </div>
            @endif
        </div>

        <div class="topbar-right">
            @if(Auth::check() && !Auth::user()->isRejected())
            <!-- Grade Switcher -->
            <div class="dropdown">
                <button class="btn btn-outline-success dropdown-toggle" type="button" id="gradeSwitcher" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 10px; font-size: 0.9rem; font-weight: 600; padding: 0.5rem 1rem;">
                    <i class="fas fa-graduation-cap me-2"></i>{{ request('grade', Auth::user()->grade_level) }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="gradeSwitcher" style="border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); min-width: 200px;">
                    @php
                        $currentGrade = Auth::user()->grade_level;
                        $selectedGrade = request('grade', $currentGrade);
                        $gradeNumber = null;
                        
                        // Extract grade number from current grade level
                        if (preg_match('/Grade (\d+)/', $currentGrade, $matches)) {
                            $gradeNumber = (int)$matches[1];
                        }
                        
                        // Determine available grades based on current grade
                        $availableGrades = [];
                        
                        if ($gradeNumber) {
                            // For Grade 6-10: Show Grade 6 up to current grade
                            if ($gradeNumber >= 6 && $gradeNumber <= 10) {
                                for ($i = 6; $i <= $gradeNumber; $i++) {
                                    $availableGrades[] = "Grade $i";
                                }
                            }
                            // For Grade 11: Show all grades from 6 to 11 only (not 12)
                            elseif ($gradeNumber == 11) {
                                for ($i = 6; $i <= 11; $i++) {
                                    if ($i <= 10) {
                                        $availableGrades[] = "Grade $i";
                                    } else {
                                        // Add Grade 11 with strand
                                        if (strpos($currentGrade, 'STEM') !== false) {
                                            $availableGrades[] = "Grade 11 - STEM";
                                        } elseif (strpos($currentGrade, 'ABM') !== false) {
                                            $availableGrades[] = "Grade 11 - ABM";
                                        } elseif (strpos($currentGrade, 'HUMSS') !== false) {
                                            $availableGrades[] = "Grade 11 - HUMSS";
                                        } elseif (strpos($currentGrade, 'ICT') !== false) {
                                            $availableGrades[] = "Grade 11 - ICT";
                                        } else {
                                            $availableGrades[] = "Grade 11";
                                        }
                                    }
                                }
                            }
                            // For Grade 12: Show all grades from 6 to 12
                            elseif ($gradeNumber == 12) {
                                for ($i = 6; $i <= 10; $i++) {
                                    $availableGrades[] = "Grade $i";
                                }
                                // Add Grade 11 and 12 with strands
                                if (strpos($currentGrade, 'STEM') !== false) {
                                    $availableGrades[] = "Grade 11 - STEM";
                                    $availableGrades[] = "Grade 12 - STEM";
                                } elseif (strpos($currentGrade, 'ABM') !== false) {
                                    $availableGrades[] = "Grade 11 - ABM";
                                    $availableGrades[] = "Grade 12 - ABM";
                                } elseif (strpos($currentGrade, 'HUMSS') !== false) {
                                    $availableGrades[] = "Grade 11 - HUMSS";
                                    $availableGrades[] = "Grade 12 - HUMSS";
                                } elseif (strpos($currentGrade, 'ICT') !== false) {
                                    $availableGrades[] = "Grade 11 - ICT";
                                    $availableGrades[] = "Grade 12 - ICT";
                                } else {
                                    $availableGrades[] = "Grade 11";
                                    $availableGrades[] = "Grade 12";
                                }
                            }
                        }
                    @endphp
                    
                    @foreach($availableGrades as $grade)
                        <li>
                            <a class="dropdown-item {{ $grade === $selectedGrade ? 'active' : '' }}" 
                               href="{{ request()->routeIs('grades') ? route('grades', ['grade' => $grade]) : '#' }}" 
                               style="padding: 0.65rem 1rem; font-size: 0.9rem; border-radius: 8px; margin: 0.25rem 0.5rem;"
                               onclick="if (!this.href.includes('grades')) { alert('Grade switching is currently available on the Grades page.'); return false; }">
                                <i class="fas fa-book me-2"></i>{{ $grade }}
                                @if($grade === $selectedGrade)
                                    <i class="fas fa-check ms-2 text-success"></i>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <div class="user-menu">
                <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <div class="user-info">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">Student</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content {{ Auth::check() && Auth::user()->isRejected() ? 'no-sidebar' : '' }}">
        @yield('content')
    </div>

    <!-- Bottom Bar - Beta Testing Notice -->
    <div class="bottom-bar" id="bottomBar">
        <div class="bottom-bar-icon">
            <i class="fas fa-flask"></i>
        </div>
        <div class="bottom-bar-content">
            <div class="bottom-bar-title">
                <i class="fas fa-exclamation-triangle me-2"></i>BETA TESTING MODE - LOCAL DEVELOPMENT
            </div>
            <p class="bottom-bar-text">
                This is a beta version running locally. For deployment, see DEPLOYMENT.md file. Laravel requires PHP hosting (Heroku, Railway, Render, etc.) - Netlify is not compatible.
            </p>
        </div>
        <button class="bottom-bar-close" onclick="document.getElementById('bottomBar').style.display='none'">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('menuToggle');
            
            if (window.innerWidth <= 992) {
                if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>
