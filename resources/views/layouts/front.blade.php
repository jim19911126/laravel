<html>

<head>
    <title>@yield('title')</title>
</head>

<body style="background-color: pink;">

    <nav class="navbar navbar-expand-sm bg-danger navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.html') }}">HTML</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.js') }}">JS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.php') }}">PHP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.python') }}">Python</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>