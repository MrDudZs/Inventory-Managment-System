<head>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('index') }}">IMS</a>
    @if (Auth::check())
        <form action="{{ route('logout') }}" method="post" class="d-inline">
            @csrf
            <button class="btn btn-success my-2 my-sm-0" type="submit">
                Logged in: {{ Auth::user()->email }}
            </button>
        </form>
    @else
        <a class="btn btn-success my-2 my-sm-0" href="{{ route('login') }}">Login</a>
    @endif
</nav>