
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Tasks for Today') | TSA4</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            color: #252b42;
        }

        .sidebar {
            width: 245px;
            height: 100vh;
            position: fixed;
            background: #202945;
            color: white;
            padding: 30px 20px;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: block;
            color: #cbd2e3;
            text-decoration: none;
            padding: 14px;
            margin-bottom: 8px;
            border-radius: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #394a76;
            color: white;
        }

        .sidebar .auth-links {
            border-top: 1px solid #39445f;
            margin-top: 25px;
            padding-top: 20px;
        }

        .main {
            margin-left: 245px;
            padding: 40px;
            min-height: 100vh;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 29px;
            margin-bottom: 8px;
        }

        .header p {
            color: #858da0;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 22px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 18px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .task:last-child {
            border-bottom: none;
        }

        .task h3 {
            font-size: 16px;
            margin-bottom: 7px;
        }

        .task small {
            color: #858da0;
        }

        .status {
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .pending {
            background: #fff1d6;
            color: #b7791f;
        }

        .done {
            background: #d9f5e7;
            color: #168653;
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 10px 16px;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            margin: 3px;
        }

        .btn-primary {
            background: #394a76;
            color: white;
        }

        .btn-primary:hover {
            background: #202945;
        }

        .btn-edit {
            background: #e8efff;
            color: #3156a3;
        }

        .btn-danger {
            background: #ffe5e5;
            color: #c53030;
        }

        .btn-secondary {
            background: #edf0f5;
            color: #39445f;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            text-align: left;
            padding: 16px;
            border-bottom: 1px solid #edf0f5;
        }

        .table th {
            color: #778096;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #dce1eb;
            border-radius: 7px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: 2px solid #394a76;
        }

        .error {
            color: #c53030;
            font-size: 13px;
            margin-top: 6px;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d9f5e7;
            color: #168653;
        }

        .alert-error {
            background: #ffe5e5;
            color: #c53030;
        }

        .empty {
            text-align: center;
            color: #858da0;
            padding: 35px;
        }

        .profile-info {
            line-height: 2.5;
        }

        footer {
            margin-top: 40px;
            color: #9299a8;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 18px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .sidebar a {
                display: inline-block;
                padding: 10px;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .task {
                align-items: flex-start;
                flex-direction: column;
            }

            .table {
                min-width: 650px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="brand">
            ✓ Tasks for Today
        </div>

        <nav>
            <a href="{{ route('home') }}"
               class="{{ request()->routeIs('home') ? 'active' : '' }}">
                🏠 Dashboard
            </a>

            <a href="{{ route('tasks') }}"
               class="{{ request()->routeIs('tasks', 'tasks.create', 'tasks.edit') ? 'active' : '' }}">
                📋 All Tasks
            </a>

            <a href="{{ route('profile') }}"
               class="{{ request()->routeIs('profile') ? 'active' : '' }}">
                👤 Profile
            </a>

            <a href="{{ route('about') }}"
               class="{{ request()->routeIs('about') ? 'active' : '' }}">
                ℹ️ About
            </a>
        </nav>

        <div class="auth-links">
            @auth
                <p style="color:#cbd2e3; padding:10px;">
                    Hello, {{ Auth::user()->name }}!
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-secondary">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>

    </aside>

    <main class="main">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                Please check the form for errors.
            </div>
        @endif

        @yield('content')

        <footer>
            Tasks for Today Management System | IT0049 - TSA4 | Laravel
        </footer>

    </main>

</body>
</html>
