<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <title>Posty-app</title>
</head>
<body class="bg-secondary">

<!-- navbar starts -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            &nbsp;
            <strong>POSTY-app</strong>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/')  }}"><strong>Home</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard')  }}"><strong>Dashboard</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/posts')  }}"><strong>Posts</strong></a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">

                {{-- You can write "@auth @endauth" instead of "@if @endif"           --}}
                {{-- or you can write "auth()->check()" instead of "auth()->user()" --}}
                @if(auth()->user())
                    <li class="nav-item">
                        <a href="{{ route('user_profile', auth()->user()) }}" class="nav-link"><strong>{{ auth()->user()->name }}</strong></a>
                    </li>
                    <li class="nav-item">
{{--                        <a href="{{ route('logout')  }}" class="nav-link"><strong>Logout</strong></a>--}}
                        <form action="{{ route('logout')  }}" method="post">
                            @csrf
                            <button class="btn" style="font-weight: bold">Logout</button>
                        </form>
                    </li>

                @else
                    {{-- You can write "@guest @endguest" instead of "@else"           --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login')  }}"><strong>Login</strong></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/register')  }}" class="nav-link"><strong>Register</strong></a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

<!-- navbar ends -->

@yield('content')


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
