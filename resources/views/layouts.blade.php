<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Students Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root{
            --main-red: rgb(134,96,151);
            --main-violet: rgb(51,24,75);
            --white:#ffffff;
            --bg-dark: rgb(43,5,73);
        }

        /* Décale tout le contenu sous la navbar fixée */
        body{
            margin:0;
            font-family:'Segoe UI',sans-serif;
            background:#f9f9f9;
            padding-top:70px; /* hauteur navbar */
        }

        /* Navbar */
        .navbar-custom{
            background:var(--main-red);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .dropdown-item{
            color:var(--white);
        }
        .navbar-custom .nav-link:hover{
            color:var(--main-violet);
        }

        /* Sidebar */
        .sidebar{
            position:fixed;
            top:70px;           /* aligne sous la navbar */
            left:0;
            width:220px;
            height:100%;
            background:var(--main-violet);
            padding-top:20px;
        }
        .sidebar a{
            display:block;
            color:#fff;
            padding:14px 24px;
            text-decoration:none;
            transition:.3s;
            font-weight:500;
        }
        .sidebar a:hover{ background:var(--main-red); }
        .sidebar a.active{
            background:#fff;
            color:var(--main-red);
            font-weight:bold;
        }

        /* Contenu */
        .main-content{
            margin-left:220px;
            padding:40px;
            overflow-x:hidden;
        }
        .pagination{
            position:relative;
            z-index:10;
            background:#f9f9f9;
            padding:10px;
        }
        svg{ z-index:1 !important; }

        @media (max-width:768px){
            .sidebar{
                position:relative;
                width:100%;
                height:auto;
            }
            .main-content{
                margin-left:0;
            }
        }
    </style>
    @yield('scripts-before')
</head>

<body>

    <!-- Navbar FIXED -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Student Manager</a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- vos liens ou drops ici -->
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="{{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a>
        <a class="{{ request()->is('students*') ? 'active' : '' }}" href="{{ url('/students') }}">Students</a>
        <a class="{{ request()->is('teachers*') ? 'active' : '' }}" href="{{ url('/teachers') }}">Teachers</a>
        <a class="{{ request()->is('promotions*') ? 'active' : '' }}" href="{{ url('/promotions') }}">Promotions</a>
        <a class="{{ request()->is('courses*') ? 'active' : '' }}" href="{{ url('/courses') }}">Courses</a>
        <a class="{{ request()->is('payement*') ? 'active' : '' }}" href="{{ url('/payement') }}">Payment</a>
        <a class="{{ request()->is('enrollments*') ? 'active' : '' }}" href="{{ url('/enrollments') }}">Inscription</a>
    </div>

    <!-- Contenu -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
